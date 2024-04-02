<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if(App::isProduction()){
            URL::forceScheme('https');
        }

        $myFile2 = "/tmp/firebase_credentials.json";
        $myFileLink2 = fopen($myFile2, 'w+');
        $newContents = json_encode(array(
                'type' => env('FC_TYPE',''),
                'project_id' => env('FC_PROJECT_ID',''),
                'private_key_id' => env('FC_PRIVATE_KEY_ID',''),
                'private_key' => env('FC_PRIVATE_KEY',''),
                'client_email' => env('FC_CLIENT_EMAIL',''),
                'client_id' => env('FC_CLIENT_ID',''),
                'auth_uri' => env('FC_AUTH_URI',''),
                'token_uri' => env('FC_TOKEN_URI',''),
                'auth_provider_x509_cert_url' => env('FC_AUTH_PROVIDER_X509_CERT_URL',''),
                'client_x509_cert_url' => env('FC_CLIENT_X509_CERT_URL',''),
                'universe_domain' => env('FC_UNIVERSE_DOMAIN',''),
            )
        );
        fwrite($myFileLink2, $newContents);
        fclose($myFileLink2);
    }
}
