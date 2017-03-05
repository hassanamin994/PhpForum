<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoryHandeller
 *
 * @author seif
 */
class CategoryHandeller extends DBHandeller {
    
    var $table = "category";
    var $resultSet = "Category";
    
    function __construct() {
        parent::__construct();
    }
}
