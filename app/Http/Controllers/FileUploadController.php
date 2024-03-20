<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use LynX39\LaraPdfMerger\Facades\PdfMerger;


class FileUploadController extends FirebaseController
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();

            $fileSize = filesize($file);
            $files = $request->session()->get('files') ?? [];
            array_push($files,array(
                'name' => $fileName,
                'size' => $fileSize
            ));
            
            $this->upload_to_firebase_storage($file);
            $request->session()->put('files',$files);

            // Handle other logic (e.g., database updates, etc.) as needed
            return redirect()->back()->with('success', 'File uploaded successfully.');
        }
        return redirect()->back()->with('error', 'No file selected.');
    }

    public function getFileFromSession(Request $request){

        $data = $request->session()->get('files');

        if($data && count($data) === 0)
            $data = array();

        return response()->json($data, 200);
    }

    public function removeFile(Request $request){
        try{
            $file = $request->input('file');
            $files = session()->get('files');
            $files = array_filter($files,function($item) use($file){
                return $item['name'] !== $file;
            });
            
            $this->delete_file_from_firebase_storage($file);
            session()->put('files',$files);

            return response()->json(array(
                'message' => 'Successfully deleted!'
            ),200);

        }catch(Exception $e){
            return response()->json(array(
                'error' => $e->getMessage()
            ),401);
        }
    }

    public function mergePDF(Request $request){

        $files = $request->session()->get('files');
        if($files && count($files) > 0){
            $merger = PdfMerger::init();

            foreach($files as $k => $v){
                $file_name = $this->get_file_from_firebase_storage($v['name']);
                $merger->addPDF($file_name,'all');
            }

            $merger->merge();
            $merger->save('merged-files.pdf','');
        }

        return response()->json(array(
            'message' => 'Failed since there are no pdf files supplied!'
        ),200);

    }
}
