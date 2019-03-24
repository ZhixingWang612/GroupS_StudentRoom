<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>contract</title>
    <link rel="stylesheet" href="css\style.css">


    <style type="text/css">
        #button0 {
            positoin: absolute;
            margin-left: 0px;
            margin-rigth: 0px;
            margin-bottom: 0px;
            width: 60px;
        }

        #button1 {
            positoin: absolute;
            margin-left: 0px;
            margin-rigth: 0px;
            margin-bottom: 0px;
            width: 60px;
        }

        #button2 {
            positoin: relative;
            margin-left: 0px;
            margin-rigth: 0px;
            margin-bottom: 0px;
            width: 60px;

        }
    </style>
</head>
<body>
<?php
require 'pagehead.php';
?>
<div class="main">
    <br><br>
    <div class="Contract">
        <form >
            <fieldset>
                <table border="1" width="900px">
                    <tr>
                        <td colspan="6" align="center"><h3><b>Your Booking History </b></h3></td>
                    </tr>
                    <tr>
                        <td align="center">Name</td>
                        <td align="center">Phone</td>
                        <td align="center">state</td>
                        <td align="center">tanency</td>
                        <td align="center">checkInTime</td>
                        <td colspan="3" align="center">Operation</td>
                    </tr>

                    <?php
                    /**
                     * Created by PhpStorm.
                     * User: 23647
                     * Date: 2019/3/22
                     * Time: 10:20
                     */
                    $listSize = 6;
                    if (empty($_GET["page"])) {

                        header("Location: ReservationRecord.php?page=1");


                        exit;
                    } else {
                        $page = $_GET["page"];
                        if ($page<1){

                            header("Location: ReservationRecord.php?page=1");


                            exit;
                        }
                        $offset = ($page - 1) * $listSize;

                        require("conn/connect.php");


                        $sql_count="select count(i_order) num from studentroom.t_order where state='11'or state = '31'and i_student=".$_SESSION['id'];
                        $result_count = my_query($sql_count);

                        $total=$result_count[0]['num'];
                        if ($total!=0&&$total<=$offset){
                            $page=floor($total/$listSize);
                            if($total%$listSize>0){
                                $page++;
                            }

                            header("Location: ReservationRecord.php?page=".$page);


                            exit;
                        }

                        $sql = "select * from studentroom.t_order where state='11' or state='31' and i_student = ".$_SESSION['id']." limit " .$offset. ",".$listSize;


                        $result = my_query($sql);

                       // print_r($result);
                        $num = count($result);


                        for ($i = 0; $i < $num; $i++) {
                            echo '<tr>';
                            echo ' <td align="center">' . $result[$i]['name'] . '</td>
                                   <td align="center">' . $result[$i]['phone'] . '</td>
                                   <td align="center">' . $result[$i]['state'] . '</td>
                                   <td align="center">' . $result[$i]['tanency'] . '</td>
                                   <td align="center">' . $result[$i]['check_in_time'] . '</td>';
                            if( $result[$i]['state']==11){ echo  '     <td align="center" width="60px"><input type="button" id="button0" value="confirm" onclick="updateState(' . $result[$i]['i_order'] .')"></td>
                          ';  }
                            if ($result[$i]['state']==31){echo  '     <td align="center" width="60px"><input type="button" id="button1" value="sign" onclick="sign(' . $result[$i]['i_order'] .')"></td>
                               ';     }
                             echo  ' <td align="center" width="60px"><input type="button" id="button2" value="delete"  onclick="deleteId(' . $result[$i]['i_order'] .');"></td>';
                            echo '</tr>';
                        }
                        echo '</table>TOTAL RECORD:  '.$total;
                        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CURRENT PAGE:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                        if ($offset>0){
                            echo ' <a href="ReservationRecord.php?page='.($page-1).'">&lt;</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                        }else{
                            echo ' <a>&lt;</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                        }
                        $totalpage=floor($total/$listSize);
                        if($total%$listSize>0){
                            $totalpage++;
                        }
                        if ($totalpage==0) {
                            $totalpage = 1;
                        }
                        echo $page.'/'.$totalpage;
                        if ($offset+$listSize+1<$total){
                            echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="ReservationRecord.php?page='.($page+1).'">&gt;</a>';
                        }else{
                            echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a>&gt;</a>';
                        }

                    }

                    ?>
                    <!--<td align="center">hhhhh</td>
                    <td align="center">hhhhh</td>
                    <td align="center">hhhhh</td>
                    <td align="center" width="60px"><input type="file" id="txtfilePath" name="txtfilePath" style="display:none;"><input type="button" id="button1" onclick="txtfilePath.click()" value="upload"></td>
                    <td align="center" width="60px"><input type="button" id="button2" value="auditing"></td>-->

            </fieldset>
        </form>
    </div>
</div>
<script>




    function deleteId(id) {
        if(confirm("delete it or not")==true) {
            window.location.href = "ReservationAction.php?ID=" + id + "&name=delete";
        }
    }
    function updateState(id){
        if(confirm("confirm it or not")==true){
           window.location.href="ReservationAction.php?ID="+id +"&name=confirm";
        }
    }
    function sign(id){
        if(confirm("confirm it or not")==true){
            window.location.href="ReservationAction.php?ID="+id +"&name=sign";
        }
    }
</script>
</body>
</html>

