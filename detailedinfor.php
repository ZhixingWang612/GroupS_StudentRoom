<?php
    session_start();
?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <title>Your searchroom</title>
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

            var timer = setInterval(move,30);

            odiv.onmousemove=function(){clearInterval(timer);};

            odiv.onmouseout=function(){timer = setInterval(move,30)};

            document.getElementsByTagName('a')[0].onclick = function(){

                spa=-2;

            };

            document.getElementsByTagName('a')[1].onclick = function(){

                spa=2;

            }

        }

    </script>

</head>

<body>
<?php
require 'pagehead.php';
//Start connection
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
                   <div id=\"div1\" class=\"images\">


                             <ul>

                                <li><img src=\"{$result[0]['img_path1']}\"/></li>

                               <li><img src=\"{$result[0]['img_path2']}\"/></li>

                               <li><img src=\"{$result[0]['img_path3']}\"/></li>

                               <li><img src=\"{$result[0]['img_path4']}\"/></li>

                              </ul>

                   </div>
            <label style=\"position:absolute;left: 50px;top:360px;width: 750px;height:250px;background: deepskyblue;\">{$result[0]['detail_description']}</label>

            ";

?>


<input type="button" class="makeApplicationBtn" value="Make Application" onclick="makeApply(<?php echo $id ?>)">

<div class="map">
    //We were planning to add a map, but failed due to time constraint...
</div>

</body>
<script>
    function makeApply(id) {
        location.href='detailedinforDo.php?id='+id;
    }

</script>

</html>