<?php

namespace Awsome\Core;

use Twig_Loader_Filesystem;
use Twig_Environment;
use Twig_Autoloader;

class AwsomeView {
    
    public function __construct() {

    }

    public function render($view, $params = array()) {

        // $filename = VIEWS_PATH . strtolower($view) . ".php";

        // if (file_exists($filename)) {
            
        //     extract($params);
        //     include_once $filename;
        // }

        $extensions = array("html", "twig", "twig.html");

        Twig_Autoloader::register();

        $loader = new Twig_Loader_Filesystem(VIEWS_PATH);
        
        $twig = new Twig_Environment($loader, array(
            // 'cache' => VIEWS_CACHE_PATH,
        ));

        foreach ($extensions as $ext) {

            $file = $view . "." . $ext;

            if (file_exists(VIEWS_PATH . $file)) {

                echo $twig->render($file, $params);

                break;
            }
        }
    }
}