<?php
require_once 'DBHandeller.php';
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
    function getTree($category_id){
        $query1 = "select category.id ,category.name , forum.id as forum_id , forum.name as forum_name , count(thread.id)as threadsNum from "
                . "category inner join forum on category.id=forum.category_id and category.id=:id left outer join"
                . "  thread on forum.id=thread.forum_id group by forum.id";
        $prep1 = $this->db->prepare($query1);
        $prep1->execute([":id"=>$category_id]);
        $result = $prep1->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
