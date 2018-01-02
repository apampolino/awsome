<?php

namespace Awsome\Core;

use Awsome\Core\AwsomeInterface;
use Awsome\Core\AwsomeModel;
use Awsome\Core\AwsomeView;
use Awsome\Core\AwsomeRequest;
use Awsome\Core\AwsomeResponse;

class AwsomeController implements AwsomeInterface {
    
    protected $db;

    protected $view;

    protected $model;

    protected $response;

    protected $request;

    public function __construct() {

        $this->view = new AwsomeView;

        $this->model = new AwsomeModel;

        $this->request = new AwsomeRequest;

        $this->response = new AwsomeResponse;
    }

    public function index() {

    }
}