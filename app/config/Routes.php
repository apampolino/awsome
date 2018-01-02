<?php

$app->route('GET', '/', "WelcomeController@index");

$app->route('GET', "/\/show\/(.*)/", "WelcomeController@show");

$app->route('GET', "/test", function($param1, $param2){

    echo "parameter 1: " . $param1 . "<br/>";
    echo "parameter 2: " . $param2;
});

// $app->route('GET', "/test/{param1}/{param2}", function($param1, $param2) {

//     echo "parameter 1: " . $param1 . "<br/>";
//     echo "parameter 2: " . $param2;
// });

$app->route('GET', "/oauth", "OauthController@index");

$app->route('POST', "/oauth", "OauthController@index");

$app->route('PUT', "/oauth", "OauthController@index");

$app->route('DELETE', "/oauth", "OauthController@index");