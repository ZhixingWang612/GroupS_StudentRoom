<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/23 0023
 * Time: 10:48
 */



    $id = $_GET['ID'];
    require("conn/connect.php");
    if($_GET['name'] == "confirm") {

        $sql = "update studentroom.t_order set state = '21' where i_order=".$id;
        $require = my_idu($sql);
        header("location:ReservationRecord.php");

    } else if($_GET['name'] == "delete" ) {

        $sql = "delete from studentroom.t_order where i_order = ".$id;
        $require = my_idu($sql);
        header("location:ReservationRecord.php");

}else if($_GET['name'] == "sign") {

        $sql = "update studentroom.t_order set state = '41' where i_order=".$id;
        $require = my_idu($sql);
        header("location:ReservationRecord.php?a=1233312321");

    }






