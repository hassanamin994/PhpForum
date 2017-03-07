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
$flag=0;

?>
<html>
    <head>
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/css/style.css" rel="stylesheet">
        <style>
            .table {
                    border: white solid 2px !important;
              }
            table.table-bordered{
                border:2px solid white;
                margin-top:20px;
              }
            table.table-bordered > thead > tr > th{
                border:2px solid white;
            }
            table.table-bordered > tbody > tr > td{
                border:2px solid white;
            }
        </style>
    </head>
    <body class="back">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <div class="  cont row ">
            <div class="col-md-10 col-md-offset-1"  style="text-align: center;">
                <label>All Categories</label>
            </div>
             
            <?php
                  for($i=0;$i<$numOfForums;$i++){
                  $result=$category->getTree($i+1);                //  var_dump($result);?>
            <div class="col-md-10 col-md-offset-1">
                     
                      <table class="table table-hover table-bordered  "   style="text-align: center;">
                          <thead>
                             
                            </tr>
                            <?php $flag=0; for($x=0;$x<count($result);$x++){ ?>
                          
                              <?php 
                                if($flag==0){ $flag=1;?>
                                    <tr>
                                  <th align="center"   colspan="4" style="text-align: center;">
                                    <label>  <?php echo $result[$x]['name'];?></label>
                                </th>
                             </tr>
                              <tr>
                                  <th align="center"   colspan="2" style="text-align: center;">
                                    <label>  <?php echo "Forum Name";?></label>
                                </th>
                                 <th align="center"   colspan="1" style="text-align: center;">
                                    <label>  <?php echo "Last thread";?></label>
                                </th>
                                 <th align="center"   colspan="1" style="text-align: center;">
                                    <label>  <?php echo "Number of threads"?></label>
                                </th>
                             </tr>
                              <?php  };
                              ?>
                              
                            </thead>
                            <tbody>
                            <tr>
                                <td colspan="2">
                                    <a href="forumView.php?id=<?php echo $result[$x]['forum_id'];?>" ><?php echo $result[$x]['forum_name'];?></a>
                                </td>
                                <td>
                                    <p><?php echo $result[$x]['threadsNum'];?></p>
                                </td>
                                <td>
                                    <p><?php echo $result[$x]['threadsNum'];?></p>
                                </td>
                            </tr>
                            </tbody>
                          <?php  } ?>
                             </table>
                        
                    </div>
                     <?php  } ?>
        </div>
        
        </div>
          <div class="col-md-2"></div>
        <script src="../assets/js/jquery-3.1.1.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
    </body>
</html>


