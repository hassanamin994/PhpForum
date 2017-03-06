<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../main.php';
include('../header.php') ;
$category=new CategoryHandeller();
$numOfForums=$category->getCount();


?>
<html>
    <head>
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/css/style.css" rel="stylesheet">
    </head>
    <body class="back">
        <div class="cont">
            <?php
                for($i=0;$i<$numOfForums;$i++){
                    $result=$category->getTree($i);
                    for($x=0;$x<count($result);$x++){?>
                    <div class="row " style="text-align: center">
                        
                        <table class="col-md-6" border="1" style="text-align: center">
                            <tr>
                                <th align="center"   colspan="3">
                                    <?php echo $result[$x]['name'];?>
                                </th>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="forumView.php?id=<?php echo $result[$x]['forum_id'];?>" ><?php echo $result[$x]['forum_name'];?></a>
                                </td>
                                <td>
                                    <p><?php echo $result[$x]['threadsNum'];?></p>
                                </td>
                            </tr>
                        </table>
                        
                    </div>
        
                    <?php  }}?>
            </div>
        
        
        <script src="../assets/js/jquery-3.1.1.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
    </body>
</html>


