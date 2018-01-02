<?php

namespace Awsome\Core;

use \PDO;

class AwsomeDatabase {
    
    private $db;
    private $query;

    public function __construct() {
        
        $config = require_once CONFIG_PATH;
        $this->db = $this->connect($config['db']['default']);
    }

    protected function connect($config) {

        if ($config) {

            $host = $config['host'];
            $dbname = $config['dbname'];
            $username = $config['username'];
            $password = $config['password'];
            $isPdo = $config['pdo'];

            if ($isPdo) {

                try {

                    $pdo = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $username, $password, array(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => TRUE));

                
                } catch (PDOException $e) {

                   die($e->getMessage());
                }
            }

            return $pdo;
        }
    }

    public function select($query) {

        $this->query = $query;
    }

    public function insert($table, $params) {

    }

    public function update($query, $params) {

    }

    public function delete($query, $params) {

    }

    public function where($params) {

    }

    public function whereOr($params) {

    }

    public function result() {

    }
}