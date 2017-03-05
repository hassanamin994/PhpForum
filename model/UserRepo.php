<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserRepo
 *
 * @author seif
 */
class UserRepo extends DBHandeller {
    
    var $table = "user";
    var $resultSet = "User";
    
    function __construct() {
        parent::__construct();
    }
}
