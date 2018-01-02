<?php

    function dump($params) {

        echo "<pre style='background-color:black; color:white;'>";
        call_user_func('var_dump', $params);
        echo "</pre>";
    }