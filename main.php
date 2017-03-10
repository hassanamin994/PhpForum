<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
// autoload
function __autoload($class_name) {
    
    if(file_exists("model2/".$class_name.".php")){
        echo "if";
        include ("model2/".$class_name.".php");
    }
 else {
        echo"else";
        echo $class_name;
          include ("model/".$class_name.".php");
    }
   
        
      
}
