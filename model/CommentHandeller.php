<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CommentHandeller
 *
 * @author seif
 */
class CommentHandeller extends DBHandeller{

    var $table = "comment";
    var $resultSet = "Comment";

    function __construct() {
        parent::__construct();
    }
    function selectAllBy($field, $id){
      $query1 = "SELECT * FROM  $this->table where $field=:id";
      $prep1 = $this->db->prepare($query1);
      $prep1->execute([':id'=>$id]);
      $post = $prep1->fetchAll();
      return $post;
    }
}
