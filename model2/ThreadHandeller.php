<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PostHandeller
 *
 * @author seif
 */
class ThreadHandeller extends DBHandeller {
    
    var $table = "thread";
    var $resultSet = "thread";
    
    function __construct() {
        parent::__construct();
    }
    
    function getTree(){
        $query1 = "SELECT * FROM  $this->table ";
        $prep1 = $this->db->prepare($query1);
        $prep1->execute();
        $post = $prep1->fetchAll(PDO::FETCH_ASSOC);
        return $post;
    }
}
