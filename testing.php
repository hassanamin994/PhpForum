<?php

//--------------------------
//this file just for testing 
//-----------------------------
include 'main.php';

$errors=array();
$inputs=array("fname"=>"seif","lname"=>"eleslam","username"=>"seif121","password"=>"123","email"=>"seif@gmail.com",
    "gender"=>"male","country"=>"egypt","banned"=>"0","signature"=>"seif","role"=>"admin","image"=>"o_o");
//$inputs=array("fname"=>"seif","lname"=>"eleslam","email"=>"seif@gmail.com",
//    "gender"=>"male","country"=>"egypt","banned"=>"0","signature"=>"seif","role"=>"admin","image"=>"o_o");

//$userRepo = new UserHandeller();
//$user=new User("ali","eleslam","seif121","123","seif@gmail.com",
   // "male","egypt","0","seif","admin","o_o");
//$usrArr=$user->toArray();
//var_dump($usrArr);
//$userRepo->insert($usrArr);
//$errors= $userRepo->validateData($usrArr);
//var_dump($errors);
//echo "----------------------------------";
//$user=$userRepo->getAllRows();
//var_dump($user);

//echo "testing catergoury >>>";
//$category=new CategoryHandeller();
//$result=$category->getAllRows();
//var_dump($result);
//
//echo "testing forum >>>";
//$forum=new ForumHandeller();
//$result2=$forum->getAllRows();
//var_dump($result2);
//
//echo "testing post >>>";
$post=new ThreadHandeller();
$result3=$post->getLastRowBy("forum_id",1);
var_dump($result3);
////
//echo "testing comment >>>";
//$comment=new CommentHandeller();
//$result4=$comment->getOneRow("thread_id",1);
//var_dump($result4);

//$forum=new ForumHandeller();
//$result=$forum->getLastRowBy("id");
//$category=new CategoryHandeller();
//$result=$category->getTree(1);
//var_dump($result);
//echo "--------------";
//var_dump($result4);

//$category=new CategoryHandeller();
//$numOfForums=$category->getCount();
//echo $numOfForums;
//for($i=1;$i<=$numOfForums;$i++){
//    echo ">>>>>>>>>>>>>>>>>>>>>>>>>>>";
//    $result=$category->getTree($i);
//    var_dump($result);
//}

?>

<!--<html>
    <head>
        
    </head>
    <body>
        <table>
            <?php //for($i=0;$i<count($result);$i++){ ?>
                <tr>
                    <td><?php //echo $result[0]['name'] ;?></td>
                    <td><?php //echo $result[1]['name'] ;?></td>
                </tr>
                <tr>
                    <td><?php //echo $result2[0]['name'] ;?></td>
                    <td><?php //echo $result2[1]['name'] ;?></td>
                   
                </tr>
                
            <?php //} ?>
        </table>
    </body>
</html>
-->
