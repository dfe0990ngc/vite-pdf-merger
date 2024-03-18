<?php

namespace App\Http\Controllers;

use App\Mail\ThankYouMail;
use Illuminate\Http\Request;
use App\Models\PDFMergeSubscriber;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class PDFMergeSubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscribers = PDFMergeSubscriber::all();

        return response()->json($subscribers,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'email' => 'required|email|unique:pdfmergesubscribers,email',
        ],[
            'email' => 'Welcome back! It seemed you are already subscribed.'
        ]);

        if(!$validator->fails()){
            $email = $request->input('email');
            $subscriber = PDFMergeSubscriber::where('email',$email)->
            orWhere('active',false)->get();

            if($subscriber->count() > 1){
                PDFMergeSubscriber::where(['email' => $email])->update(['active' => true]);
            }else{
                PDFMergeSubscriber::create(['email' => $email,'active' => true]);
            }

            $thankyouMail = new ThankYouMail();
            Mail::to($email)->bcc('pdfmergerauthor@gmail.com')->send($thankyouMail);


            return response()->json(array(
                'message' => 'Awesome! You have subscribed with our news and updates!'
            ),200);
        }

        return response()->json(['errors' => $validator->errors()], 422);

    }

    public function update(Request $request){
        $email = $request->input('email');
        PDFMergeSubscriber::where('email',$email)->update(['active' => false]);

        return view('unsubscribed');
    }
}
