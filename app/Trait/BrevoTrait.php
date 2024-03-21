<?php

namespace App\Trait;

use Exception;
use GuzzleHttp\Client;
use SendinBlue\Client\Configuration;
use SendinBlue\Client\Model\SendSmtpEmail;
use SendinBlue\Client\Api\TransactionalEmailsApi;

trait BrevoTrait
{
    public function sendSMTP($email = '', $name = 'Subscriber'){

        if($email === '') return;

        $config = Configuration::getDefaultConfiguration()->setApiKey('api-key','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');
        $BrevoInstance = new TransactionalEmailsApi(new Client(),$config);  

        $sendSmtpEmail = new SendSmtpEmail();
        $sendSmtpEmail['to'] = array(array(
            'email'=> $email, 
            'name'=> $name
        ));
        $sendSmtpEmail['templateId'] = 2;
        $sendSmtpEmail['params'] = array('email' => $email);
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
