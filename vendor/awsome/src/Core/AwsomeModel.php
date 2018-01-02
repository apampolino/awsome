<?php

namespace Awsome\Core;

use Awsome\Core\Database;

class AwsomeModel extends AwsomeDatabase{
    
    protected $table;
    protected $columns;
    protected $fields;
    protected $useDefaultConnection = TRUE;

    public function __construct() {

        parent::__construct();
    }

    public function rows($fields = array(), $params = array(), $options = array()) {

        if ($fields) {

            $fields = explode(",", $fields);
            
            return $this->query("SELECT " . substr($fields, 0, count($fields) - 1) . $this->$table, $params, $options);

        } else {

            return $this->query("SELECT * FROM ". $this->table, $params, $options);
        }
    }

    public function paginate() {

    }

    public function getColums() {
        
    }
}