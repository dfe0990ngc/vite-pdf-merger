<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Trait\BrevoTrait;

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
        $email = $request->input('email');
        $this->unsubscribe_email($email);
        return view('unsubscribed');
    }
}
