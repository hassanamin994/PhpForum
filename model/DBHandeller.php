<?php


/**
 * Description of DBHandeller
 *
 * @author seif
 */

define('HOST','localhost');
define('DB_NAME','jaguars');
define('DB_USERNAME','root');
define('DB_PASSWORD','root');

class DBHandeller {
    
    private $dsn ;
    public  $db ;
    public $table;
    public $resultSet;
            
    function __construct(){
        
            $this->dsn = 'mysql:host='.HOST.';dbname='.DB_NAME; 
            $this->db = new PDO($this->dsn,DB_USERNAME,DB_PASSWORD);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
    
    function getAllRows(){
        $query1 = "SELECT * FROM  $this->table ";
        $prep1 = $this->db->prepare($query1);
        $prep1->execute();
        $post = $prep1->fetchAll(PDO::FETCH_ASSOC);
        return $post;
    }
    
    function selectBy($field,$id){
        $query1 = "SELECT * FROM  $this->table where $field=:id";
        $prep1 = $this->db->prepare($query1);
        $prep1->execute([':id'=>$id]);
        $prep1->setFetchMode(PDO::FETCH_ASSOC);
        $post = $prep1->fetch();
        return $post;
    }
    
    function getOneRow($field,$id){
        $query1 = "SELECT * FROM  $this->table where $field=:id";
        $prep1 = $this->db->prepare($query1);
        $prep1->execute([':id'=>$id]);
        $prep1->setFetchMode(PDO::FETCH_ASSOC);
        $post = $prep1->fetch();
        return $post;
    }
    function getLastRow($field){
        $query1 = "SELECT * FROM  $this->table ORDER BY $field DESC LIMIT 1";
        $prep1 = $this->db->prepare($query1);
        $prep1->execute();
        $prep1->setFetchMode(PDO::FETCH_ASSOC);
        $post = $prep1->fetch();
        return $post;
    }
    
    function getLastRowBy($field,$value){
        $query1 = "SELECT * FROM  $this->table WHERE $field=$value ORDER BY id DESC LIMIT 1";
        $prep1 = $this->db->prepare($query1);
        $prep1->execute();
        $prep1->setFetchMode(PDO::FETCH_ASSOC);
        $post = $prep1->fetch();
        return $post;
    }
    
    
    function getInsertedId()
    {
        return $this->db->lastInsertId();
    }
    
    function update($key, $data)
    {
        //how to use it ?
        //$key is assoc array contains update condition --> $key=["thread_id"=>10];
        //$data is is assoc array contains updated fileds -->$data=["contect"=>"xyz","title"=>"xyz"];
        $tkey = key($key);
        $kval = $key[$tkey];

        $param = array();
        $param[":" . $tkey] = $kval;

        $update = array();
        foreach ($data as $key => $val) {
            $param[":" . $key] = $val;
            $update[] = " `$key` = :$key ";
        }

        $this->query("UPDATE $this->table SET " . implode(",", $update) . " WHERE $tkey = :$tkey ", $param);
    }
    
    function insert($data)
    {
        //how to use it ?
        //$data is assoc array contains new data to insert into that table --> $data=["thread_id"=>10,"content"=>"xyz",....];
        $k = array();
        $v = array();
        $param = array();
        foreach ($data as $key => $value) {
            $k[] = " `$key` ";
            $v[] = " :$key ";
            $param[":" . $key] = $value;
        }

        $this->query("INSERT INTO " . $this->table . "(" . implode(',', $k) . ") VALUES (" . implode(',', $v) . ");", $param);

        return $this->getInsertedId();
    }
    function query($sql, $data)
    {
        try {
            $rs = $this->db->prepare($sql);
            if (!$rs->execute($data)) {
                var_dump($rs->errorInfo());
                exit("SQL ERROR: ".$sql);
            }
            return $rs;
        } catch (Exception $ex) {
            //echo $sql;
        }

        return false;
    }

    function removeByID($field,$id)
    {
        $this->query("DELETE FROM $this->table WHERE $field = :id",array('id' => $id));
    }
    
    function validateData($class){
        
        $errors = array() ;
        foreach($class as $key => $value) {
           
            if(empty($value)){
              array_push($errors,"Invalid ".$key);
            }
             
        }
        return $errors;
    }
    
    // ----------this function moved to each table Handeller file , check it
    // ------------Do not use this function 
//    function getTree($childTable,$subChildTable){
//        $query1 = "select forum.id as childId,forum.name as childName, count(thread.id) as numOfsubchilds from "
//                . "category,forum,thread where  forum.category_id=category.id and thread.forum_id=forum.id group by forum.id";
//        $prep1 = $this->db->prepare($query1);
//        $prep1->execute();
//        $result = $prep1->fetchAll(PDO::FETCH_ASSOC);
//        return $result;
//        
//    }
    
    public function getCount(){
        $query1 = "SELECT count($this->table.id) as NumOfChildren FROM  $this->table ";
        $prep1 = $this->db->prepare($query1);
        $prep1->execute();
        $result = $prep1->fetchColumn();
        //$num=count($result);
        return $result;
    }
    
}
