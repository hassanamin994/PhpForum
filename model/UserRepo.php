<?php

class UserRepo extends DBHandeller {
    
    var $table = "user";
    var $resultSet = "User";
    
    function __construct() {
        parent::__construct();
    }
}
