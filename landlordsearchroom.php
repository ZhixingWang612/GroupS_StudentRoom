<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>landlord landlordsearchroom</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
    .div-b{width:600px;height:175px;border:1px;olid 2px; }
    .div-a{ float:left;width:48%;height: 100%;border:1px;  }
    .photo{ float:left;width:48%;border:1px; }
    .intro { float:right;width:48%;border:1px; }
</style>
<body>
<?php
session_start();
require 'pagehead.php';
?>

<!-- img+content -->
<div>
    <hr style=" height:3px;border:none;border-top:2px dotted #ffffff;" />
    <div class="div-a">
        <?php

        $sessionId=$_SESSION['id'];
        $listSize = 3;
        if (empty($_GET["page"])||$_GET["page"]<1) {
            header("Location:landlordsearchroom.php?page=1");
            exit;
        } else {
            $page = $_GET["page"];
            $offset = ($page - 1) * $listSize;
            require("conn/connect.php");
            $countSql = "select count(i_property) num from t_property where i_owner=$sessionId";
            $querySql = "select * from studentroom.t_property where i_owner=$sessionId";
            $sql='';
            global $iskitchen;
            $iskitchen=0;
            global $issmoke;
            $issmoke=0;
            global $ispet;
            $ispet=0;
            if (empty($_GET['iskitchen'])) {
                $nameErr = "Name is required";
            } else {
                $iskitchen = $_GET['iskitchen'];

                if($iskitchen==1){
                    $sql = $sql . " and kitchen=" . $iskitchen;}
            }

            if (empty($_GET['issmoke'])) {
                $nameErr = "Name is required";
            } else {
                $issmoke = $_GET['issmoke'];
                if($issmoke==1){
                    $sql = $sql . " and smoker=" . $issmoke;}
            }
            if (empty($_GET['ispet'])) {
                $nameErr = "Name is required";
            } else {
                $ispet = $_GET['ispet'];

                if($ispet==1) {
                    $sql = $sql . " and pets=" . $ispet;}
            }
            $result_count = my_query($countSql.$sql);
            $total=$result_count[0]['num'];
            if ($total!=0&&$total<=$offset){
                $page=floor($total/$listSize);
                if($total%$listSize>0){
                    $page++;
                }
                header("Location: landlordsearchroom.php?page=".$page);
                exit;
            }
            // Results
            $result = my_query($querySql.$sql." limit ".$offset.",".$listSize);
            if($result){
                $rowNum = count($result);
                for($i=0; $i<$rowNum; $i++){
                    echo "<div class=\"div-b\">
            <div class=\"photo\"><img src=\"{$result[$i]['img_path']}\" onclick='img({$result[$i]['i_property']})'></div>
            <div class=\"intro\">
                <p>{$result[$i]['description']}</p>

            </div>
        </div>

        <hr />
        ";
                }
                if ($offset>0){
                    echo ' </table><a href="landlordsearchroom.php?page='.($page-1).'&issmoke='.$issmoke.'&iskitchen='.$iskitchen.'&ispet='.$ispet.'">PREVIOUS</a>';
                }else{
                    echo ' </table><a>PREVIOUS</a>';
                }
                echo ' page '.$page.' ';
                if ($page*$listSize<$total){
                    echo '<a href="landlordsearchroom.php?page='.($page+1).'&issmoke='.$issmoke.'&iskitchen='.$iskitchen.'&ispet='.$ispet.'">NEXT</a>';
                }else{
                    echo '<a>NEXT</a>';
                }
            }else{
                echo 'Sorry, not results found';
            }
        }


        ?>
    </div>
    <!-- map-->


</div>
</body>
<script>
    function img(id) {

        window.open('landlorddetailedinfor.php?id='+id);

    }

</script>
</html>