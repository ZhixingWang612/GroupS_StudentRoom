<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Account</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
    session_start();
    require 'pagehead.php';
?>
<div class="main">
    <br><br>
    <?php

    require("conn/connect.php");
    $sessionId=$_SESSION['id'];

    $sql = "select * from studentroom.t_student_detail where i_student='$sessionId'";
    $result = my_query($sql);
    if ($result) {
        /*"<input id=\"major\" value=\"{$result[0]['course']}\" type=\"text\" name=\"major\">";
         echo "{$result[0]['course']}"*/
        echo " <div class=\"EditYourProfile\" style=\"position: absolute;left: 550px;\">
        <form action=\"YourAccountDo.php\" method=\"post\" name=\"edit\">
            <fieldset>
                <h2><b>Edit Your Profile</b></h2><br>
                <p><b>Gender</b></p>
                <input type=\"radio\" value=\"1\"  name=\"gender\" "; echo $result[0]['gender']==1?"checked":""; echo " /><div style=\"position: absolute;top: 100px;left: 220px;\">Male</div>
                <input type=\"radio\" value=\"0\"  name=\"gender\" "; echo $result[0]['gender']==0?"checked":"" ;echo " /><div style=\"position: absolute;top: 140px;left: 220px;\">Female</div>
                <p><b>Major</b></p>
                <input id=\"major\" value=\"{$result[0]['course']}\"  type=\"text\" name=\"major\"><br>
                <p><b>Date of Enrollment</b></p>
                <ul>

                    <select id=\"year\" name=\"Year\" style=\"position: absolute;right: 100px;top: 235px;width:80px;height: 25px;\">
                        <option>{$result[0]['year_of_study']}</option>
                        <option>1995</option>
                        <option>1996</option>
                        <option>1997</option>
                        <option>1998</option>
                        <option>1999</option>
                        <option>2000</option>
                        <option>2001</option>
                    </select>
                </ul>
                <p><b>School</b></p>
                <input id=\"school\" type=\"text\" value={$result[0]['university']} name=\"School\"><br>
                <p><b>PhoneNumber</b></p>
                <input id=\"number\" value={$result[0]['phone_number']} type=\"number\" name=\"PhoneNumber\"><br>
               <input type='submit' value='Update' style='width:130px;height:40px;background-color: black;color: azure; border: 0; font-size: 30px;margin-left: 110px;margin-top: 20px'>
            </fieldset>
        </form>
    ";
    }else {
        echo "<div class=\"EditYourProfile\" style=\"position: absolute;left: 550px;\">
        <form action=\"YourAccountDo.php\" method=\"post\" name=\"edit\">
            <fieldset>
                <h2><b>Edit Your Profile</b></h2><br>
                <p><b>Gender</b></p>
                <input type=\"radio\" value=\"1\"  name=\"gender\" checked /><div style=\"position: absolute;top: 100px;left: 220px;\">Male</div>
                <input type=\"radio\" value=\"0\"  name=\"gender\"  /><div style=\"position: absolute;top: 140px;left: 220px;\">Female</div>
                <p><b>Major</b></p>
                <input id=\"major\"  type=\"text\" name=\"major\"><br>
                <p><b>Date of Enrollment</b></p>
                <ul>

                    <select id=\"year\" name=\"Year\" style=\"position: absolute;right: 100px;top: 235px;width:80px;height: 25px;\">
                        <option></option>
                        <option>1995</option>
                        <option>1996</option>
                        <option>1997</option>
                        <option>1998</option>
                        <option>1999</option>
                        <option>2000</option>
                        <option>2001</option>
                    </select>
                </ul>
                <p><b>School</b></p>
                <input id=\"school\" type=\"text\"  name=\"School\"><br>
                <p><b>PhoneNumber</b></p>
                <input id=\"number\"  type=\"number\" name=\"PhoneNumber\"><br>
               <input type='submit' value='Update' style='width:130px;height:40px;background-color: black;color: azure; border: 0; font-size: 30px;margin-left: 110px;margin-top: 20px'>
            </fieldset>
        </form>
    ";
    };
?>
    </div>

</div>

</body>

</html>