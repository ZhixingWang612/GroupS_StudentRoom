<?php

session_start();
$sessionId=$_SESSION['id'];
$id = $_GET['id'];
if (empty($sessionId)) {
    $nameErr = "Name is required";
} else {
    $id = $_GET['id'];

    require("conn/connect.php");

    $sql1 = "select * from studentroom.t_user where i_user=1";

    $result1 = my_query($sql1);

    $name = '"' . "{$result1[0]['first_name']}" . '"';
    $phone = '"' . "{$result1[0]['phone']}" . '"';
    $email = '"' . "{$result1[0]['email']}" . '"';


    $sql2 = "select * from studentroom.t_property where i_property=$id ";
    $result2 = my_query($sql2);
    $landlordid = "{$result2[0]['i_owner']}";


    $sql123 = "insert into studentroom.t_order(i_student,name,phone,i_property,i_landlord,email,apply_date,state) VALUES($sessionId,$name,$phone,$id,$landlordid,$email,now(),1)";

    my_idu($sql123);
    echo '<script>alert("success");location.href = "homePage.php";</script>';
}
?>