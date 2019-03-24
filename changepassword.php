<?php
session_start();
$sessionId=$_SESSION['id'];
/*echo $_SESSION['id'];*/
if ($_SERVER["REQUEST_METHOD"] == "POST"){
//Change password
        $oldPwd = $_POST['oldPwd'];
        $newPwd = $_POST['newPwd'];
        $newPwds = $_POST['newPwds'];
    if ($oldPwd == '' || $newPwd == '' || $newPwds == '') {
        echo "<script> if(confirm( 'Please input full information ')) location.href='changepassword.php'; </script>";
    } else {
        if ($newPwd == $newPwds){
            if($oldPwd != $newPwd){
                //Start connecting
                require("conn/connect.php");
                $sql = "select * from studentroom.t_user where i_user='$sessionId'and password='$oldPwd'";
                // Results
                $result = my_query($sql);
                if ($result) {
                    /*  require("conn/connect.php");*/
                    $sql1="update studentroom.t_user set password ='$newPwd' where i_user = '$sessionId'";
                    $key = my_idu($sql1);
                    if($key>0){
                        echo "<script> alert( 'Password changing successful, please re-login '); location.href='logout.php'; </script>";
                        exit;
                    }
                } else {
                  echo "<script> alert( 'Original password incorrect'); location.href='changepassword.php'; </script>";
                }
            }else{
                echo "<script> alert(\"New password can't be the same as original password\");</script>";
            }
        }else{
            echo "<script> alert(\"Two passwords must match\");</script>";
        }

    }

}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>changPassword</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        require 'pagehead.php';
    ?>
<div class="main">
    <br><br>
    <div class="pwd">

        <h2 style="padding-top: 30px">ChangePassword</h2>  <br>

        <form action="changepassword.php" method="post" class="form-horizontal" name="pwd">

            <div class="form-group"><!--Original password-->
                <div class="pwd1">oldPwd：<input id="oldPwd" type="password" name="oldPwd" ></div><br>

            </div>
            <div class="form-group"><!--New password-->
                <div class="pwd2"> newPwd：<input id="newPwd" type="password" name="newPwd" ></div><br>

            </div>
            <div class="form-group"><!--Confirm new password-->
                <div class="pwd3"> confirmPwd：  <input id="newPwds" type="password" name="newPwds"> </div><br>


            </div>
            <span class="tips" id="tips"></span>
            <div class="form-group"><!--Confirm button-->
                <div class="col-sm-offset-2 col-sm-6">
                    <input id="ok" type="submit" value="Confirm" class="confirm">
                    <input id="no" type="button" value="Back" class="back">

                </div>
            </div>

        </form>


    </div>

</div>

</body>
<script>
    ok = document.getElementById("ok");
    no = document.getElementById("no");
    oldPwd = document.getElementById("oldPwd");
    newPwd = document.getElementById("newPwd");
    newPwds = document.getElementById("newPwds");
    tips = document.getElementById("tips");
    // var $no = $("#no");
    no.onclick = function() {
        window.location.reload();
        location.href='YourAccount.php'
    };
</script>
</html>

