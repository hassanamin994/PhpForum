<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ForumHandeller
 *
 * @author seif
 */
class ForumHandeller extends DBHandeller {
   
    var $table = "forum";
    var $resultSet = "Forum";
    
    function __construct() {
        parent::__construct();
    }
}
