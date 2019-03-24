<?php


$id=$_GET['id'];
$issmoke = $_GET['issmoke'];
$ispet = $_GET['ispet'];
$iskitchen = $_GET['iskitchen'];
$textarea = '"' . "{$_GET['textarea']}" . '"';

    require("conn/connect.php");


$sql = 'update t_property set smoker ='.$issmoke.',pets = ' . $ispet . ',kitchen = ' . $iskitchen . ',detail_description= ' . $textarea . ' where i_property = '. $id;


my_idu($sql);
echo '<script>alert("success");location.href = "homePage.php";</script>';

?>