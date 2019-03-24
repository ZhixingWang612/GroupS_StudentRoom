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
//Get information of the uploaded file
//$certificate = $_FILES["certificate"];
$picnum = count($_FILES);

$filenames = array();

$file = $_FILES["certificate"];

//var_dump($_FILES);
//See if there are anything uploading
if (!empty($file)) {
    $picname = $file["name"];
    $picsize = $file["size"];
//Get image size   512k--->512*1000512k--->512*1000
    if ($picsize > 2 * 1024 * 1024) {
//    Image can't exceed 2MB otherwise might cause error
        echo "Picture size should not exceed 2MB. Please re-select";
        exit;//End
    }
//Get image format
    $type = strstr($picname, ".");
    if ($type != ".gif" && $type != ".jpg" && $type != ".png") {
        //Output 'image format error'
        echo $type . "----The picture format is incorrect";
        exit;
    }
//Create new file name

    $pics = time() . rand(1, 9999);//1970-1-1

    move_uploaded_file($file["tmp_name"], "file/" . $pics);
    $filenames[4]=$pics;
}
$pics = $_FILES["pics"];

$picnum = count($pics["name"]);
for ($i = 0; $i < $picnum; $i++) {
    $picname = $pics["name"][$i];
    $picsize = $pics["size"][$i];



    if ($picsize > 2 * 1024 * 1024) {

        echo "Picture size should not exceed 2MB. Please re-select";
        exit;//Exit upload process if picture exceed size
    }

    $type = strstr($picname, ".");
    if ($type != ".gif" && $type != ".jpg" && $type != ".png") {
        echo $type . "----The picture format is incorrect";
        exit;//Exit upload process if picture format incorrect
    }


    $picname = time() . rand(1, 9999);//1970-1-1

    move_uploaded_file($pics["tmp_name"][$i], "file/" . $picname);
    $filenames[$i]=$picname;
}


//Insert database

require("conn/connect.php");


$sql = "INSERT INTO studentroom.t_property
(
address,
full_address,
post_code,
summary,
description,
release_date,
img_path,
img_path1,
img_path2,
img_path3,
img_path4,
certificate)
VALUES(
" . $_POST["address1"] . "," . $_POST["address2"] . "," . $_POST["post-code"] . "," . $_POST["Summary"] . "," . $_POST["description"] . ",'" . date("Y/m/d") . "'," . $filenames[0] . "," . $filenames[0] . "," . $filenames[1] . "," . $filenames[2] . "," . $filenames[3] . "," . $filenames[4] . "
)";


 my_idu($sql);

header("Location: Landlordsearchroom.php");


exit;

?>