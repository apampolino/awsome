<?php

namespace Awsome\Helper;

class Helper {
    
    public static function dump_json($params) {

        echo json_encode($params);

        die();
    }
}
