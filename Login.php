<?php
    session_start();
    header('Content-type:text/html;charset=utf-8');
    if(isset($_SESSION['email']) ){
        echo ('<script>alert("You have already logged in");
                    location.href  ="homepage.php";                </script>');
    }
    if(isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        //Start connection
        require("conn/connect.php");
        $sql = "select * from studentroom.t_user where email='$email'and password='$password'";

        // Results
        $result = my_query($sql);
        if ($result) {
            $_SESSION['email']=$_POST['email'];
            $_SESSION['name'] =$result[0]['last_name'].$result[0]['first_name'];
            $_SESSION['id'] = $result[0]['i_user'];
            $_SESSION['type'] =$result[0]['type'];
            $_SESSION['picture'] = $result[0]['picture'];
            header('location:homePage.php');
            exit;
        } else {
            header('location:Login.php');
            echo "<script>alert('Password mismatch');</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
    require "pagehead.php";
?>
<div class="main">
    <br><br>
    <div class="Login">
        <form action="Login.php" method="post" >
            <fieldset>
                <h3><b>Log in</b></h3><br>
                <p><b>Username (Email Address)</b></p>
                <input type="email" name="email"><br>
                <p><b>Password</b></p>
                <input type="password" name="password"><br>
                <input type="submit" name="submit" value="submit"/>
            </fieldset>
        </form>

    </div>

</div>

</body>
</html>