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
    session_start();
    require 'pagehead.php';
?>
<div class="main">
    <br><br>
    <div class="Contract">
        <form action="aaaa.php" method="get" name="upload">
            <fieldset>
                <table border="1" width="900px">
                    <tr>
                        <td colspan="6" align="center"><h3><b>Upload Contract </b></h3></td>
                    </tr>
                    <tr>
                        <td align="center">NO</td>
                        <td align="center">Title</td>

                        <td align="center">Apply Date</td>
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

                        header("Location: OrderList.php?page=1");


                        exit;
                    } else {
                        $page = $_GET["page"];
                        if ($page < 1) {

                            header("Location: OrderList.php?page=1");


                            exit;
                        }
                        $offset = ($page - 1) * $listSize;



                        require("conn/connect.php");
                        $sql_count = "select count(i_order) num from studentroom.t_order where state=21";
                        $result_count = my_query($sql_count);
                        $total = $result_count[0]['num'];
                        if ($total != 0 && $total <= $offset) {
                            $page = floor($total / $listSize);
                            if ($total % $listSize > 0) {
                                $page++;
                            }

                            header("Location: OrderList.php?page=" . $page);


                            exit;
                        }

                        $sql = "select * from studentroom.t_order t where t.state=21 or t.state=41 limit " . $offset . "," . $listSize;



                        $result = my_query($sql);
                        $num = count($result);

                        for ($i = 0; $i < $num; $i++) {
                            echo '<tr>';
                            echo ' <td align="center">' . $result[$i]['i_order'] . '</td>
                                   <td align="center">' . $result[$i]['name'] . '</td>
                                
                                   <td align="center">' . $result[$i]['apply_date'] . '</td>';
                            echo  '<td align="center" width="60px"><input type="button" id="button0" contractID="' . $result[$i]['i_order'] . '" value="view" onclick="viewDetails(this);"></td>';
                            if($result[$i]['state']==21){
                                echo  '<td align="center" width="60px"><input type="button" id="button1" contractID="' . $result[$i]['i_order'] . '" onclick="uploadf(this);" value="upload"></td>';
                            }else{
                                echo  '<td align="center" width="60px"><input type="button" id="button2" contractID="' . $result[$i]['i_order'] . '" onclick="pass(this);" value="auditing"></td>';
                            }


                            echo '</tr>';
                        }
                        echo '</table>TOTAL RECORD:  ' . $total;
                        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CURRENT PAGE:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                        if ($offset > 0) {
                            echo ' <a href="OrderList.php?page=' . ($page - 1) . '">&lt;&lt;</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                        } else {
                            echo ' <a>&lt;&lt;</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                        }
                        $totalpage = floor($total / $listSize);
                        if ($total % $listSize > 0) {
                            $totalpage++;
                        }
                        if ($totalpage == 0) {
                            $totalpage = 1;
                        }
                        echo $page . '/' . $totalpage;
                        if ($page < $totalpage) {
                            echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="OrderList.php?page=' . ($page + 1) . '">&gt;&gt;</a>';
                        } else {
                            echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a>&gt;&gt;</a>';
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
        <form action="upload.php" id="uploadForm" method="post" enctype="multipart/form-data" >
            <input type="file" name="myFile" id="fileupload" style="display: none;" />
        </form>
    </div>


</div>

<script>
    document.getElementById("fileupload").onchange = function () {
        document.getElementById("uploadForm").submit();
    };

    function uploadf(orderItem) {
        var contractID = orderItem.getAttribute("contractID");

        document.getElementById("uploadForm").action = "ContractUploadDo.php?contractID=" + contractID;
        document.getElementById("fileupload").click();

    }
    function pass(orderItem) {
        var contractID = orderItem.getAttribute("contractID");
        location.href = "ContractUploadDo.php?head=pass&contractID=" + contractID;
    }

    function viewDetails(orderItem) {
        window.open("OrderDetail.php?contractID="+orderItem.getAttribute("contractID"),"_blank");
       // window.location.href="OrderDetail.php?contractID="+orderItem.getAttribute("contractID");
    }

</script>
</body>
</html>

