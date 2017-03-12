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

<<<<<<< HEAD
    
    
   function getTree($thread_id){
       $query1 = "select forum.name as forum_name,thread.description as description,thread.edit_by as edit_by,thread.last_update as last_update,thread.id as thread_id,thread.title as thread_title ,user.created_at as userdate,user.role as role,user.id as ownerId,user.username as owner,user.image as image,thread.created_at as date,count(comment.id) as numOfComments FROM "
                  ."forum inner join thread on thread.id=:id and forum.id=thread.forum_id inner join user on thread.user_id=user.id left outer join comment on thread.id=comment.thread_id GROUP by thread.id";
       $prep1 = $this->db->prepare($query1);
       $prep1->execute([":id"=>$thread_id]);
       $result = $prep1->fetchAll(PDO::FETCH_ASSOC);
       return $result;
   }
  
=======
    function getTree($thread_id){
        $query1 = "select forum.name as forum_name,thread.description as description,thread.id as thread_id,thread.title as thread_title ,user.created_at as userdate,user.role as role,user.id as ownerId,user.username as owner,user.image as image,thread.created_at as date,count(comment.id) as numOfComments FROM "
                   ."forum inner join thread on forum.id=:id and forum.id=thread.forum_id inner join user on thread.user_id=user.id left outer join comment on thread.id=comment.thread_id GROUP by thread.id";
        $prep1 = $this->db->prepare($query1);
        $prep1->execute([":id"=>$thread_id]);
        $result = $prep1->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    function getLastThreadByCategory($category_id,$forum_id){
        $query1 = "SELECT thread.id, thread.title FROM  $this->table, forum, category WHERE category.id=forum.category_id AND $this->table.forum_id=$forum_id ORDER BY $this->table.id DESC LIMIT 1";
        $prep1 = $this->db->prepare($query1);
        $prep1->execute();
        $prep1->setFetchMode(PDO::FETCH_ASSOC);
        $post = $prep1->fetch();
        return $post;
    }
>>>>>>> 226b2e64349cbf00f760148dc026953915d64586
}
