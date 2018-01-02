<?php

namespace Awsome\Hook;

class Hook {

    public function __construct() {

        echo "Hook class loaded";
    }

    public static function hook($type = 'pre', &...$params) {
        
        $caller = debug_backtrace()[1]['function'];

        if(function_exists($type . "_" . $caller)) {

            call_user_func_array($type . "_" . $caller, $params);
        }
    }
}