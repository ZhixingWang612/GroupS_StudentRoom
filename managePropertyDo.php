<?php
/**
 * Created by PhpStorm.
 * User: feich
 * Date: 2019/3/22
 * Time: 21:11
 */

if(isset($_GET['head'])){

    $head = $_GET['head'];

    $id = $_GET['propertyId'];
    $state;
    if(strcmp($head, 'pass')){
        // 9--deleted
        $state=9;
    }
    require 'conn/connect.php';
    $sql = 'update t_property set state = ' . $state . ' where i_property = '. $id;
    my_idu($sql);
    header('location:manageProperty.php');
}