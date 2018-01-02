<?php

namespace App\Models;

use Awsome\Core\AwsomeModel;

class UserModel extends AwsomeModel {
    
    protected $table = "users";
    protected $columns = array();

    public function __construct() {

        parent::__construct();

        echo __CLASS__ . " loaded..";
    }
}