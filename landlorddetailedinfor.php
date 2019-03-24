<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>landlord searchroom</title>
    <link rel="stylesheet" href="css/style.css">
   <style>
        * { margin: 0; padding: 0;}
        #div1{ width: 800px; height: 150px; position: relative; margin: 100px auto;overflow: hidden;}
        #div1 ul { width: 800px; height: 150px; position: relative; }
        #div1 ul li { height: 150px; float: left; list-style: none; padding-right:20px;}
        #div1 ul li img { width: 200px; height: 150px; display: inline-block;}
        a{ color: #B4B4B4; }
    </style>
    <script type="text/javascript">
        window.onload=function(){

            var odiv = document.getElementById('div1');

            var oul = odiv.getElementsByTagName('ul')[0];

            var ali = oul.getElementsByTagName('li');

            var spa = -2;

            oul.innerHTML=oul.innerHTML+oul.innerHTML;

            oul.style.width=ali[0].offsetWidth*ali.length+'px';

            function move(){

                if(oul.offsetLeft<-oul.offsetWidth/2){

                    oul.style.left='0';

                }

                if(oul.offsetLeft>0){

                    oul.style.left=-oul.offsetWidth/2+'px'

                }

                oul.style.left=oul.offsetLeft+spa+'px';

            }

            var timer = setInterval(move,30)

            odiv.onmousemove=function(){clearInterval(timer);}

            odiv.onmouseout=function(){timer = setInterval(move,30)};

            document.getElementsByTagName('a')[0].onclick = function(){

                spa=-2;

            }

            document.getElementsByTagName('a')[1].onclick = function(){

                spa=2;

            }

        }

    </script>

</head>

<body>
<?php
session_start();
    require 'pagehead.php';
?>

<div >
    <div class="Dropdown">
        <button class="menu2">&nbsp;<strong>more filter</strong> &nbsp;</button>
        <div class="Dropdown_content1" style="display: none">
            <div style="color: red" id="node1"><input type="checkbox" <?php if(isset($_GET['ispet'])&&$_GET['ispet']==1) echo 'checked'?> name="category" value="pet" /><strong>pet</strong> </div>
            <div style="color: red" id="node2"><input type="checkbox" <?php if(isset($_GET['issmoke'])&&$_GET['issmoke']==1) echo 'checked'?> name="category" value="smoke" /><strong>smoke</strong></div>
            <div style="color: red" id="node3"><input type="checkbox" <?php if(isset($_GET['iskitchen'])&&$_GET['iskitchen']==1) echo 'checked'?> name="category" value="kitchen" onclick="fliter()" /><strong>kitchen</strong></div>
        </div>

    </div>

</div>



<?php

//$sessionId=$_SESSION['id'];

require("conn/connect.php");
if (empty($_GET['id'])) {
    $nameErr = "Name is required";
} else {
    $id = $_GET['id'];

}
$sql = "select * from studentroom.t_property where i_property=$id ";

$result = my_query($sql);

$rowNum = count($result);


echo " 
                   <div id=\"div1\" >


                             <ul>

                                <li><img src=\"{$result[0]['img_path1']}\"/></li>

                               <li><img src=\"{$result[0]['img_path2']}\"/></li>

                               <li><img src=\"{$result[0]['img_path3']}\"/></li>

                               <li><img src=\"{$result[0]['img_path4']}\"/></li>

                              </ul>

                   </div>
           
           
          

            <textarea name=\"test\" id=\"test\" style=\"position:absolute;left: 380px;top:360px;width: 750px;height:250px;background: deepskyblue;font-size:22px;\" >{$result[0]['detail_description']}</textarea>
            
            
            <button style=\"position: absolute;left: 650px;top: 650px;width: 150px;height: 40px;background: black;color: white;font-size: 17px;border: 0; \" onclick='filter({$result[0]['i_property']})'>Edit</button>

            
            ";


?>

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
    function filter(id) {
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
        var textarea = document.getElementById('test').value;
        window.location.href="landlorddetailedinforDo.php?&issmoke="+issmoke+"&iskitchen="+iskitchen+"&ispet="+ispet+"&textarea="+textarea+"&id="+id;

    }
</script>
</html>