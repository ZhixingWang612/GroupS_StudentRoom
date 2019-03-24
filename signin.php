<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/21 0021
 * Time: 20:20
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $birth_date = $_POST['birthdate'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmPassword'];

    if ($password == $confirmpassword && $email != null && $password != null) {
        //Start
        require("conn/connect.php");
        if($birth_date==null){
            $birth_date ="2019-03-01";
        }
        // Results
        $sql = "insert into studentroom.t_user(first_name,last_name,email,birth_date,password,type) values ('$first_name','$last_name','$email','$birth_date','$password',1)";
        $result = my_idu($sql);
        echo $result;

        if ($result > 0) {
            header('location:Login.php');
            exit;
        } else {
            header('location:signin.php');
            //   location.href='signin.html'
        }
    } else {

        echo "<script>alert('Password mismatch');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signin</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
       require "pagehead.php";
    ?>

<div class="main">
    <br><br>
    <div class="signUp">
        <form action="signin.php" method="post" name="form">
            <fieldset>
                <h3><b>Sign Up</b></h3>
                <p><b>Email Address</b></p>
                <input type="email" name="email"><br>
                <p><b>FirstName</b></p>
                <input type="text" name="firstname"><br>
                <p><b>LastName</b></p>
                <input type="text" name="lastname"><br>
                <p><b>Date of birth</b></p>
                <input type="date" name="birthdate">
                <p><b>Password</b></p>
                <input type="password" name="password"><br>
                <p><b>Confirm Password</b></p>
                <input type="password" name="confirmPassword">
                <button><b>Register</b></button>
            </fieldset>
        </form>
    </div>


</div>



</body>
</html>