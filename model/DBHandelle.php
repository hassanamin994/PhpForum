<?php


/**
 * Description of DBHandeller
 *
 * @author seif
 */

// define('HOST','localhost');
// define('DB_NAME','jaguars');
// define('DB_USERNAME','root');
// define('DB_PASSWORD','root');

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
        $rows = array() ;
        while($post = $prep1->fetch(PDO::FETCH_ASSOC)){
            $rows[] = $post ;
        }
        return $rows;
    }

    function getOneRow($field,$id){
        $query1 = "SELECT * FROM  $this->table where $field=:id";
        $prep1 = $this->db->prepare($query1);
        $prep1->execute([':id'=>$id]);
        $post = $prep1->fetch(PDO::FETCH_ASSOC);
        return $post;
    }

    function getInsertedId()
    {
        return $this->db->lastInsertId();
    }

    function update($key, $data)
    {
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
            echo $sql;
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
//    public function getCount(){
//        $query1 = "SELECT count($this->table.id) as NumOfChildren FROM  $this->table ";
//        $prep1 = $this->db->prepare($query1);
//        $prep1->execute();
//        $result = $prep1->fetchColumn();
//        //$num=count($result);
//        return $result;
//    }
}
