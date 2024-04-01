<?php

namespace App\Trait;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Crypt;
use SendinBlue\Client\Configuration;
use SendinBlue\Client\Model\SendSmtpEmail;
use SendinBlue\Client\Api\TransactionalEmailsApi;

trait BrevoTrait
{
    public function sendSMTP($email = '', $name = 'Subscriber'){

        if($email === '') return;

        $apiKey = env('BREVO_API_KEY','');

        $config = Configuration::getDefaultConfiguration()->setApiKey('api-key',$apiKey);
        $BrevoInstance = new TransactionalEmailsApi(new Client(),$config);  

        $sendSmtpEmail = new SendSmtpEmail();
        $sendSmtpEmail['to'] = array(array(
            'email'=> $email, 
            'name'=> $name
        ));
        $sendSmtpEmail['templateId'] = 2;
        $sendSmtpEmail['params'] = array('id' => Crypt::encryptString($email));
        // $sendSmtpEmail['headers'] = array('X-Mailin-custom'=>'custom_header_1:custom_value_1|custom_header_2:custom_value_2');

        try {
            $result =$BrevoInstance->sendTransacEmail($sendSmtpEmail);
            return $result;
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Exception when calling TransactionalEmailsApi->sendTransacEmail: '.$e->getMessage()
            ]);
        }
    }
}
