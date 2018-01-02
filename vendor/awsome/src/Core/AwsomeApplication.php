<?php

namespace Awsome\Core;

class AwsomeApplication {
    
    public $routes = array('GET' => array(), 'POST' => array(), 'PUT' => array(), 'DELETE' => array());

    public static $instance;

    public function __construct() {

        self::$instance = $this;
    }

    public function run() {

        $method = $_SERVER['REQUEST_METHOD'];

        $url = $_SERVER['REQUEST_URI'];

        $this->loadRoutes($method, $url);
    }

    public function route($req_method = "GET", $match, $method) {

        array_push($this->routes[strtoupper($req_method)], array("match" => $match, "method" => $method));
    }

    public function loadController($front_controller, $params) {

        $cm = explode('@', $front_controller);

        $class_name = "\\App\\Controllers\\" . $cm[0];

        $class_method = $cm[1];

        $this->_method = $cm[1];

        return call_user_func_array(array(new $class_name, $class_method), $params);
    }

    private function loadRoutes($http_method, $url) {

        foreach ($this->routes[$http_method] as $route) {

            $brackets = false;

            if ($route['match'] === "/") {

                $rule = "/\A\/\z/";

            } else {

                if (preg_match("/(\\|\(|\)|\.|\+|\*)/", $route['match'])) {

                    $rule = $route['match'];

                } else {

                    if (preg_match("/.*\/{.*}/", $route['match'], $matches)) {

                        $url_arr = explode("/", $url);

                        $match_arr = explode("/", $matches[0]);

                        $rule = "/";

                        $matches_arr = array();

                        for ($i = 0; $i < count($url_arr); $i++) {

                            if ($url_arr[$i] == $match_arr[$i]) {

                                $rule .= $url_arr[$i] . "\/";
                            
                            } else {

                                $rule .= $url_arr[$i] . "\/";

                                $match_key = preg_replace("/{|}/", "", $match_arr[$i]);

                                array_push($matches, array($match_key => $url_arr[$i]));
                            }
                        }

                        $rule .= "/";

                        $brackets = true;

                    } else {

                        $rule = substr($route['match'], 1, strlen($route['match']) - 1);

                        $rule = "/\A\/" . $rule . "(.*)\z/";
                    }
                }
            }

            if (preg_match($rule, $url, $matches)) {
                
                $params = count($matches) > 1 ? explode("/", $matches[1]) : explode("/", $matches[0]);

                unset($params[0]);

                $params = array_values($params);

                if (is_callable($route['method'])) {

                    return call_user_func_array($route['method'], $params);

                } else {

                    $this->loadController($route['method'], $params);
                }

            } else {

            }
        }
    }

    public static function getInstance() {

        if (self::$instance === null) {

            self::$instance = new self();
        }

        return self::$instance;
    }
}