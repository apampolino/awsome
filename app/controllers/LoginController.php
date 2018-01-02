<?php

namespace App\Controllers;

use Awsome\Core\AwsomeController;

class LoginController extends AwsomeController {
    
    public function index() {
        
        $this->view->render('login');
    }

    public function login() {
        
        var_dump($this->input->post('username'));
        var_dump($this->input->post('password'));
    }
}