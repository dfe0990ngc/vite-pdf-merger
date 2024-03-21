<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ContactUsController extends FirebaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        if(!$validator->fails()){
            $attachments = session('attachments');

            if($attachments){
                $attachments = array_map(function($item){
                    return $item['name'];
                },$attachments);

                if(count($attachments) > 0)
                    $attachments = implode(',',$attachments);
                else
                    $attachments = '';
            }

            $this->add_feedback([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'subject' => $request->get('subject'),
                'message' => $request->get('message'),
                'attachments' => $attachments
            ]);

            session()->flush();

            session()->flash('message','Thanks for sending us a message/feedback! We will review this as soon as possible and we will respond accordingly.');
            return redirect('/contact-us',302);
        }

        return response()->json(['errors' => $validator->errors()], 422);
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();

            $fileSize = filesize($file);
            $files = session()->get('attachments') ?? [];
            array_push($files,array(
                'name' => $fileName,
                'size' => $fileSize
            ));
            
            $this->upload_to_firebase_storage($file,'attachments/');
            session()->put('attachments',$files);

            // Handle other logic (e.g., database updates, etc.) as needed
            return redirect()->back()->with('success', 'File uploaded successfully.');
        }
        return redirect()->back()->with('error', 'No file selected.');
    }

    public function getFileFromSession(Request $request){

        $data = session('attachments');

        if($data && count($data) === 0)
            $data = array();

        return response()->json($data, 200);
    }

    public function removeFile(Request $request){
        try{
            $file = $request->input('file');
            $files = session('attachments') ?? [];
            $files = array_filter($files,function($item) use($file){
                return $item['name'] !== $file;
            });

            $this->delete_file_from_firebase_storage($file,'attachments/');
            session()->put('attachments',$files);

            return response()->json(array(
                'message' => 'Successfully deleted!'
            ),200);

        }catch(Exception $e){
            return response()->json(array(
                'error' => $e->getMessage()
            ),401);
        }
    }
}
