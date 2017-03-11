<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'init.php';
# get all categories
$categoryHandeller = new categoryHandeller() ;
$categories = $db->getAll('category');

?>
<html>
    <head>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">
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
    <?php include('header.php') ; ?>
    <body class="back">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <div class="  cont row ">
            <div class="col-md-10 col-md-offset-1"  style="text-align: center;">
                <label>All Categories</label>
            </div>
            <div class="col-md-10 col-md-offset-1">
              <?php
                foreach ($categories  as $category) {
                  #print each category name and it's threads in a table
                  #print last thread and threads count
              ?>
              <table class="table table-hover table-bordered " style="text-align: center;">
                  <thead>
                    <tr>
                       <th align="center"   colspan="4" style="text-align: center;">
                            <label><?php echo $category['name'] ; ?> </label>
                        </th>
                     </tr>
                      <tr>
                          <th align="center"   colspan="2" style="text-align: center;">
                            <label> Forum Name </label>
                        </th>
                         <th align="center"   colspan="1" style="text-align: center;">
                            <label> Last thread </label>
                        </th>
                         <th align="center"   colspan="1" style="text-align: center;">
                            <label> Number of threads </label>
                        </th>
                     </tr>
                    </thead>
                    <tbody>
                      <?php
                        $forums = $categoryHandeller->getTree($category['id']);
                        foreach ($forums as $forum) {
                          $thread=new ThreadHandeller();
                          $lastThread=$thread->getLastThreadByCategory($category['id'], $forum['forum_id']);
                       ?>
                      <tr>
                          <td colspan="2">
                              <a href="forum.php?forumid=<?php echo $forum['forum_id'] ;?>" ><?php echo $forum['forum_name'] ; ?></a>
                          </td>
                          <td>
                              <a href="thread.php?thread_id=<?php echo $lastThread['id']; ?>" ><?php echo $lastThread['title']; ?></a>
                          </td>
                          <td>
                              <p><?php echo $forum['threadsNum'] ; ?></p>
                          </td>
                      </tr>
                      <?php
                        }
                       ?>
                    </tbody>
                  </table>
                  <?php
                  }
                  ?>
                </div>
            </div>

        </div>
          <div class="col-md-2"></div>
        <script src="../assets/js/jquery-3.1.1.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
    </body>
</html>
