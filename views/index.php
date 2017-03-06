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
        <div class="col-md-3"></div>
        <div class="col-md-6">
        <div class="  cont">
            
            </div>
        
        </div>
          <div class="col-md-3"></div>
        <script src="../assets/js/jquery-3.1.1.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
    </body>
</html>


