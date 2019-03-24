<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2019/3/22
 * Time: 22:11
 */
session_start();
$sessionId=$_SESSION['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!empty($_POST['edit'])){
        exit('Illegal!');
    }else{

        $gender = $_POST['gender'];
        $major = $_POST['major'];
        $year = $_POST['Year'];
        $school = $_POST['School'];
        $number = $_POST['PhoneNumber'];

        if ($gender == '' || $major == '' || $year == ''|| $school == ''|| $number == '') {
            echo "<script> if(confirm( 'Please input full info')) location.href='YourAccount.php'; </script>";
        } else{

            require("conn/connect.php");
            $sql1 = "select * from studentroom.t_student_detail where i_student='$sessionId'";
            $result1 = my_query($sql1);
            if ($result1){
                $sql2 = "update studentroom.t_student_detail set gender='$gender',year_of_study='$year',university='$school',course='$major',phone_number='$number' where i_student='$sessionId'";
                $result2 = my_idu($sql2);
                if($result2>0){
                    echo "<script> alert( 'Complete!'); location.href='YourAccount.php'; </script>";
                    exit;
                }
            }else{

                $sql = "insert into studentroom.t_student_detail (i_student,gender,year_of_study,university,course,phone_number) values ('$sessionId','$gender','$year','$school','$major','$number')";

                $result = my_idu($sql);
                if ($result>0){
                    echo "<script> alert( 'Complete!'); location.href='YourAccount.php'; </script>";
                    exit;
                }
            }

        }

    }
}