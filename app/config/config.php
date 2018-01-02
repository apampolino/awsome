<?php

$config['db']['default'] = array('type' => 'mysql', 
                    'host' => 'localhost',
                    'dbname' => 'awsome',
                    'username' => 'root',
                    'password' => 'root',
                    'pdo' => true
                    );

$config['db']['other'] = array('type' => 'mysql', 
                    'host' => 'localhost',
                    'dbname' => 'casha',
                    'username' => 'root',
                    'password' => 'root',
                    'pdo' => true
                    );

return $config;