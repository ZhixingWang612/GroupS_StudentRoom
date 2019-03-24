<?php
/**
 * Created by PhpStorm.
 * User: feich
 * Date: 2019/3/22
 * Time: 16:44
 */
 if(isset($_GET['head'])){

     $head = $_GET['head'];

         $id = $_GET['applyId'];
     $state;
     if(strcmp($head, 'pass')){
         $state=2;
     }else if (strcmp($head, 'no')){
         $state=1;
     }
   require 'conn/connect.php';
     $sql = 'update t_apply set auditing_time = now(),state = ' . $state . ' where i_apply = '. $id;
     my_idu($sql);

     header('location:auditing.php');
 }