<?php

namespace Awsome\Core;

class AwsomeRequest {

    public static $instance;

    public static $request;

    public static $raw_request;

    public static $request_headers;

    public function __construct() {

        self::$request = array('GET' => array(), 'POST' => array(), 'PUT' => array(), 'DELETE' => array());

        $http_method = self::get_request_method();

        self::get_request($http_method);

        self::$raw_request = self::get_raw_request();

        self::$request_headers = self::get_request_headers();

        self::$instance  = $this;
    }

    public static function get_request($http_method) {

        self::$request[$http_method] = (array) json_decode(file_get_contents("php://input"));
    }

    public static function get($name = "") {

        if (!empty($name)) {

            return $this->request["GET"][$name];

        } else {

            return $this->request["GET"];
        }
    }

    public static function post($name = "") {

        if (!empty($name)) {

            return $this->request["POST"][$name];

        } else {

            return $this->request["POST"];
        }
    }

    public static function get_raw_request() {

        return $_REQUEST;
    }

    public static function get_request_method() {

        return $_SERVER['REQUEST_METHOD'];
    }

    public static function get_request_headers() {

        return getallheaders();
    }

    public static function getInstance() {

        if (self::$instance == null) {

            self::$instance = new self();
        }

        return self::$instance;
    }
}