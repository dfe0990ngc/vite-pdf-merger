<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class SitemapController extends FirebaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function siteMap(){
        $siteMap = $this->get_file_from_firebase_storage('sitemap.xml');

        $strXML = file_get_contents($siteMap);
        $response = Response::make($strXML, 200);
        $response->header('Content-Type','application/xml');
        return $response;
    }
}
