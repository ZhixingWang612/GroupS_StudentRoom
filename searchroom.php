<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your searchroom</title>
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
<div class="btnGroup">
    <div style="float: left">
        <button id="myButton1"  disabled="true">address <?php echo $_GET['addressVal'] ?> </button>
        <button id="myButton2"  disabled="true"> <?php echo $_GET['bedroomNumber'] ?>  bedroom</button>
        <button id="myButton3"  disabled="true"> <?php echo $_GET['bathroomNumberVal'] ?>  beshroom</button>
        <button id="myButton4"  disabled="true">$  <?php echo $_GET['priceVal'] ?> pw</button>
    </div>
    <div style="left: 500px">
        <div class="Dropdown">
            <button class="menu2">&nbsp;<strong>more filter</strong> &nbsp;</button>
            <div class="Dropdown_content1" style="display: none">
                <div style="color: red" id="node1"><input type="checkbox" <?php if(isset($_GET['ispet'])&&$_GET['ispet']==1) echo 'checked'?> name="category" value="pet" /><strong>pet</strong> </div>
                <div style="color: red" id="node2"><input type="checkbox" <?php if(isset($_GET['issmoke'])&&$_GET['issmoke']==1) echo 'checked'?> name="category" value="smoke" /><strong>smoke</strong></div>
                <div style="color: red" id="node3"><input type="checkbox" <?php if(isset($_GET['iskitchen'])&&$_GET['iskitchen']==1) echo 'checked'?> name="category" value="kitchen" onclick="fliter()" /><strong>kitchen</strong></div>
            </div>

        </div>

        <button onclick="filter()"><strong>search</strong></button>
    </div>
</div >
<!-- img+content -->
<div>
    <hr style=" height:3px;border:none;border-top:2px dotted #ffffff;" />
    <div class="div-a">
        <?php
        $listSize = 3;
        global $page;
        if (empty($_GET["page"])||$_GET["page"]<1) {
            $page=1;
        }else{
            $page = $_GET["page"];
        }
        $offset = ($page - 1) * $listSize;
        require("conn/connect.php");
        $countSql = "select count(i_property) num from t_property where 1=1";
        $querySql = "select * from studentroom.t_property where 1=1 ";
        $sql='';
        global $iskitchen;
            $iskitchen=0;
        global $issmoke;
            $issmoke=0;
        global $ispet;
            $ispet=0;
            global $addressVal;
            $addressVal=0;
            global $bedroomNumber;
            $bedroomNumber=0;
            global $bathroomNumberVal;
            $bathroomNumberVal=0;
            global $priceVal;
            $priceVal=0;
            $addressVal = $_GET['addressVal'];
            $bedroomNumber = $_GET['bedroomNumber'];
            $bathroomNumberVal = $_GET['bathroomNumberVal'];
            $priceVal = $_GET['priceVal'];

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
                header("Location: searchroom.php?page=".$page);
                exit;
            }

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
                echo ' </table><a href="searchroom.php?page='.($page-1).'&issmoke='.$issmoke.'&iskitchen='.$iskitchen.'&ispet='.$ispet.
                    '&addressVal='.$addressVal.'&bedroomNumber='.$bedroomNumber.'&bathroomNumberVal='.$bathroomNumberVal.'&priceVal='.$priceVal.'">PREVIOUS</a>';
            }else{
                echo ' </table><a>PREVIOUS</a>';
            }
            echo ' page '.$page.' ';
            if ($page*$listSize<$total){
                echo '<a href="searchroom.php?page='.($page+1).'&issmoke='.$issmoke.'&iskitchen='.$iskitchen.'&ispet='.$ispet.
                    '&addressVal='.$addressVal.'&bedroomNumber='.$bedroomNumber.'&bathroomNumberVal='.$bathroomNumberVal.'&priceVal='.$priceVal.'">NEXT</a>';
            }else{
                echo '<a>NEXT</a>';
            }
        }else{
            echo 'Sorry, no results found';

        }
        ?>
    </div>
    <!-- map-->
    <div class="div-d">
        <img style="
position:absolute; bottom:0; right:0;" src="img/Room2.jpg">
    </div>

</div>
</body>
<script>
    let menu2 = document.getElementsByClassName("menu2")[0];
    let Dropdown_content1 = document.getElementsByClassName("Dropdown_content1")[0];
    let flag1 = true;
    menu2.addEventListener('click',function(){
        if(flag1 == true){
            Dropdown_content1.style.display = "block";
            flag1 = false;
        }else{
            Dropdown_content1.style.display = "none";
            flag1 = true;
        }
    },false);
    function filter() {
        var items = document.getElementsByName("category");
        if (items[0].checked) {
            var ispet = 1;
        }
        else{
            ispet = 0;
        }
        if(items[1].checked)
        {
            var issmoke=1;
        }
        else{
            issmoke=0;
        }
        if (items[2].checked) {
            var iskitchen=1;
        }
        else{
            iskitchen=0;
        }
        window.location.href="searchroom.php?page=1&issmoke="+issmoke+"&iskitchen="+iskitchen+"&ispet="+ispet+
            "&addressVal=<?php echo isset($_GET['addressVal'])==1?$_GET['addressVal']:'' ?>"
            +"&bedroomNumber=<?php echo isset($_GET['bedroomNumber'])==1?$_GET['bedroomNumber']:'' ?>"
            +"&bathroomNumberVal=<?php echo isset($_GET['bathroomNumberVal'])==1?$_GET['bathroomNumberVal']:'' ?>"
            +"&priceVal=<?php echo isset($_GET['priceVal'])==1?$_GET['priceVal']:'' ?>";
    }

    function img(id) {
        window.open('detailedinfor.php?id='+id);
    }

</script>
</html>