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
require("conn/connect.php");
if((isset($_GET['head'])==1?$_GET['head']:'')=='pass'){
    $contractID = $_GET['contractID'];
    $sql = "update t_order set state=51 where i_order=".$contractID;
    my_idu($sql);
    header("Location: OrderList.php?page=1&a=123");
    exit();
}
//Get information of the uploaded file
$mypic = $_FILES["myFile"];
//var_dump($_FILES);
//See if there are anything uploading
if(!empty($mypic)){
    $picname = $_FILES["myFile"]["name"];
    $picsize = $_FILES["myFile"]["size"];
//Get image size   512k--->512*1000
    if($picsize>2*1024*1024){
      //Image can't exceed 2MB otherwise might cause error
        echo "Picture size should not exceed 2MB. Please re-select";
        exit;//End php
    }
//Getting image format
    $type = strstr($picname, ".");
    if($type !=".gif" && $type !=".jpg" &&$type!=".png"){
        //Output 'image format error'
        echo "The picture format is incorrect";
        exit;
    }
//Create new file name

    $pics = time().rand(1,9999);//1970-1-1

    move_uploaded_file($_FILES["myFile"]["tmp_name"],"file/".$pics);
    //
    if (empty($_GET["contractID"])) {

        header("Location: OrderList.php?page=1");

        exit;
    }else{

        $contractID=$_GET["contractID"];
        $sql = "select * from studentroom.t_order t where  t.i_order=".$contractID;
        // Results
        $result = my_query($sql);
        if(count($result)==1){
            $sql = "select * from studentroom.t_contract t where  t.i_contract=".$contractID;

            $contractResult = my_query($sql);
            session_start();

            //Legal advisor
            $i_legaladvisor="111";
            if(!empty($_SESSION['id'])){
                $i_legaladvisor=$_SESSION['id'];
            }


            if(count($contractResult)==1){

                $sql="update studentroom.t_contract  set startDate=".date("Y/m/d").",i_legaladvisor=".$i_legaladvisor.",validate=0,file=".$pics."where i_contract=".$contractID ;

                 my_idu($sql);
            }else{
                $sql="insert into studentroom.t_contract (i_contract,startDate,validate,i_legaladvisor,file) values (".$contractID.",'".date("Y/m/d")."',0,".$i_legaladvisor.",".$pics.")";

                 my_idu($sql);
            }
            $sql = "update t_order set state=3 where i_order=".$contractID;
            my_idu($sql);
            header("Location: OrderList.php?page=1");

            exit;

        }else{
            echo 'constractID dosen\'t exist in order_list';
        }

    }

}
?>