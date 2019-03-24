<?php
//上传文件的名称
//上传文件类型
//上传文件的大小
//上传文件的临时文件名称
//上传文件出错
//函数：将临时文件移动到指定目录下
//move_uploaded_file("临时文件",uploads/文件名);
//上传的文件名不能冲突，同名改名
/*------

    1kb = 1024b
    1mb = 1024kb
------*/


$mypic = $_FILES["certificate"];
$housePhoto = $_FILES["housePhoto"];
//var_dump($_FILES);

if (!empty($mypic) && !empty($housePhoto)) {
    $picname = $_FILES["certificate"]["name"];
    $picsize = $_FILES["certificate"]["size"];
    $picname2 = $_FILES["housePhoto"]["name"];
    $picsize2 = $_FILES["housePhoto"]["size"];

    if ($picsize > 2 * 1024 * 1024) {

        echo "Picture size should not exceed 2MB. Please re-select";
        exit;
    }
    if ($picsize2 > 2 * 1024 * 1024) {

        echo "Picture size should not exceed 2MB. Please re-select";
        exit;
    }

    $type = strstr($picname, ".");
    if ($type != ".gif" && $type != ".jpg" && $type != ".png") {

        echo "The picture format is incorrect";
        exit;
    }
    $type = strstr($picname2, ".");
    if ($type != ".gif" && $type != ".jpg" && $type != ".png") {

        echo "The picture format is incorrect";
        exit;
    }


    $pics = time() . rand(1, 9999);//1970-1-1
    $pics2 = time() . rand(1, 9999);//1970-1-1

    move_uploaded_file($_FILES["certificate"]["tmp_name"], "file/" . $pics);
    move_uploaded_file($_FILES["housePhoto"]["tmp_name"], "file/" . $pics2);

    if (empty($_GET["userID"])) {

        header("Location: Validate.php");


        exit;
    } else {
        require("conn/connect.php");
        $userID = $_GET["userID"];
        $sql = "select * from studentroom.t_user t where  t.i_user=" . $userID;

        $result = my_query($sql);
        if (count($result) == 1) {
            $sql = "INSERT INTO studentroom.t_apply(i_user,property_img,certificate,apply_time,state,id_number)VALUES(" . $userID . "," . $pics2 . "," . $pics . ",'" . date("Y/m/d") . "',0," . $_POST["IdNumber"] . ")";
            //echo $sql;
          // echo my_idu($sql);



            header("Location: homePage.php");


            exit;

        } else {
            echo 'Request Error';
        }

    }

}else{
    exit;
}
?>