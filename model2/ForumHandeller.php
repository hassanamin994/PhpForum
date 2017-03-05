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
    function getTree($forum_id){
        $query1 = "select forum.name as forum_name,thread.id as thread_id,thread.name as thread_name,thread.title as thread_title ,user.id as ownerId,user.username as owner,thread.created_at as date,count(comment.id) as numOfComments FROM "
                   ."forum inner join thread on forum.id=:id and forum.id=thread.forum_id inner join user on thread.user_id=user.id left outer join comment on thread.id=comment.thread_id GROUP by thread.id";
        $prep1 = $this->db->prepare($query1);
        $prep1->execute([":id"=>$forum_id]);
        $result = $prep1->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
