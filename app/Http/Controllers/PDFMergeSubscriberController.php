<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Trait\BrevoTrait;
use Illuminate\Support\Facades\Crypt;

class PDFMergeSubscriberController extends FirebaseController
{
    use BrevoTrait;

    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscribers = $this->get_subscribers();
        return response()->json($subscribers,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
        ]);

        if(!$validator->fails()){
            $email = $request->input('email');
            $subscriber = $this->is_subscriber_exists($email);
            $message = 'Awesome! You have subscribed with our news and updates!';

            if($subscriber){
                $this->resubscribe_email($email);
                $message = 'Welcome back! You are already subscribed to our news letter. Thank you for keeping in-touch with us!';
            }else{
                $this->add_subscriber_email($email);
            }

            // Send Thank you email
            try{
                $this->sendSMTP($email);
            }catch(Exception $e){
                return response()->json([
                    'error' => $e->getMessage()
                ]);
            }


            return response()->json(array(
                'message' => $message
            ),200);
        }

        return response()->json(['errors' => $validator->errors()], 422);

    }

    public function update(Request $request){

        if($request->has('id')){
            $id = $request->input('id');
            $email = Crypt::decryptString($id);
            $this->unsubscribe_email($email);
        }

        return redirect('/',302);
    }

    public function unsubscribe(Request $request){
        $id = $request->input('id');
        $email = Crypt::decryptString($id);
        $subscriber = $this->is_subscriber_exists($email);
        
        $is_subscribed = true;

        if($subscriber){
            $subscriber = array_column($subscriber,'active');

            $is_subscribed = boolval($subscriber[0]) === TRUE;
        }

        return view('unsubsribe',array('id' => $id,'is_subscribed' => $is_subscribed));
    }
}
