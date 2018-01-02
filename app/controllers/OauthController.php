<?php

namespace App\Controllers;

use Awsome\Core\AwsomeController;
use Awsome\Core\Oauth;

class OauthController extends AwsomeController {
    
    public function index() {

        $oauth = new Oauth();
    }
}