<?php

namespace Awsome\Core;

class AwsomeResponse {

    public static $instance;

    public static $response;

    public function __construct() {

        self::$instance = $this;
    }

    public static function json_response($code, $headers = array(), $data = array()) {

        $status = array( 200 => 'OK',
                            201 => 'Created',
                            202 => 'Accepted',
                            400 => 'Bad Request',
                            401 => 'Unauthorized',
                            403 => 'Forbidden',
                            404 => 'Not Found',
                            405 => 'Not Allowed',
                            500 => 'Internal Server Error',
                            501 => 'Not implemented',
                            503 => 'Service Unavailable');
        
        $res = array('message' => $status[$code]);

        header_remove();

        http_response_code($code);

        header("Cache-Control: no-transform, private, max-age=300, s-maxage=900");

        if (!empty($headers)) {

            foreach ($headers as $header) {

                header($header);
            }
        }

        header('Content-Type: application/json');

        if (!empty($data)) {

            $res['data'] = $data;
        }

        echo json_encode($res);

        exit;
    }

    private static function getInstance() {

        if (self::$instance == null) {

            self::$instance = new self();
        }

        return self::$instance;
    }
}