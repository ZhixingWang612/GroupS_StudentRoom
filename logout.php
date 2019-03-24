<?php
session_start();
header('Content-type:text/html;charset=utf-8');
if(isset($_SESSION['email']) ){
    session_unset();//free all session variable
    session_destroy();//Clear all data in one session
    setcookie(session_name(),'',time()-3600);//Clear session name
    header('location:homePage.php');
}else{
    header('location:homePage.php');
}
?>