<?php

namespace App\Http\Controllers;

use Exception;
use Kreait\Laravel\Firebase\Facades\Firebase;

class FirebaseController extends Controller
{
    protected $auth;
    protected $database;
    protected $storage;
    public function __construct()
    {
        $this->auth = Firebase::project('app')->auth();
        $this->database = Firebase::project('app')->database('firebase.database');
        $this->storage = Firebase::project('app')->storage('firebase.storage');
    }

    public function get_subscribers(){
        return $this->database->getReference("subscribers")->getValue() ?? [];
    }

    public function is_subscriber_exists($email = ''){
        if($email === '' ) false;

        $subscribers = $this->get_subscribers();
        $value = array_filter($subscribers,function($subscriber) use($email){
            return $subscriber['email'] === $email;
        });

        return $value;
    }

    public function add_subscriber_email($email = ''){
        if($email === '') return;

        $this->database->getReference("subscribers")->push([
            'email'=>$email,
            'active'=> true
        ]);
    }
    
    public function resubscribe_email($email = ''){
        if($email === '') return;

        $reference = $this->database->getReference('subscribers');
        $value = $reference->getValue();
        $ref = array_filter($value,function($item) use($email){
            return $item['email'] === $email;
        });
        $objID = array_keys($ref)[0];

        $this->database->getReference("subscribers/$objID")->update([
            'active' => true
        ]);
    }
    
    public function unsubscribe_email($email = ''){
        if($email === '') return;

        $reference = $this->database->getReference('subscribers');
        $value = $reference->getValue();
        $ref = array_filter($value,function($item) use($email){
            return $item['email'] === $email;
        });
        $objID = array_keys($ref)[0];

        $this->database->getReference("subscribers/$objID")->update([
            'active' => false
        ]);
    }
    public function add_feedback($feedback = null){
        if($feedback === null) return;

        $reference = $this->database->getReference('feedbacks');
        $reference->push([
            'name' => $feedback['name'],
            'email' => $feedback['email'],
            'subject' => $feedback['subject'],
            'message' => $feedback['message'],
            'attachments' => $feedback['attachments']
        ]);
    }

    public function upload_to_firebase_storage($file = null,$folder_name = ''){
        if($file === null) return;

        if($folder_name !== '' && strpos($folder_name,'/') === FALSE)
            $folder_name .= '/';
        
        $file_name = $file->getClientOriginalName();
        $file->move('/tmp',$file_name);

        $this->storage->getBucket()->upload(fopen('/tmp/'.$file_name,'r'),['name' => $folder_name.$file_name]);

        if(file_exists('/tmp/'.$file_name)){
            unlink('/tmp/'.$file_name);
        }
    }
    public function get_files_from_firebase_storage(){
        return $this->storage->getBucket();
    }
    public function get_file_from_firebase_storage($file_name = '', $folder_name = ''){
        if($file_name == '') return;

        if($folder_name !== '' && strpos($folder_name,'/') === FALSE)
            $folder_name .= '/';

        $file = $this->storage->getBucket()->object($folder_name.$file_name);
        $file->downloadToFile('/tmp/'.$file_name);

        return '/tmp/'.$file_name;
    }
    public function delete_file_from_firebase_storage($file_name = '',$folder_name = ''){
        if($file_name === '') return;

        if($folder_name !== '' && strpos($folder_name,'/') === FALSE)
            $folder_name .= '/';

        try{
            $this->storage->getBucket()->object($folder_name.$file_name)->delete();
        }catch(Exception $e){

        }finally{
            if(file_exists('/tmp/'.$file_name)){
                unlink('/tmp/'.$file_name);
            }
        }

    }
}
