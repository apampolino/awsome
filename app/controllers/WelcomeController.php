<?php

namespace App\Controllers;

use Awsome\Core\AwsomeController;

class WelcomeController extends AwsomeController {
    
    public function __construct() {

        parent::__construct();
    }

    public function index() {

        $this->view->render('welcome', array('name' => 'test'));
    }

    public function show($param) {
        
        var_dump($param);
    }
}