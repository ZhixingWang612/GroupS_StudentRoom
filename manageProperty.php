<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>manageProperty</title>
    <link rel="stylesheet" href="css\style.css">
</head>
<body>
<?php
session_start();
require 'pagehead.php';
?>
<div class="main">
    <br><br>
    <div class="Contract">
        <form action="managePropertyDo.php" method="get">
            <fieldset>
                <table border="1" width="900px" id="tab">
                    <tr>
                        <td colspan="8" align="center"><h3><b> Manage Property</b></h3></td>
                    </tr>
                    <tr>
                        <td align="center">Property ID</td>
                        <td align="center">Owner ID</td>
                        <td align="center">Owner Name</td>
                        <td align="center">Owner Phone</td>
                        <td align="center">Owner Email</td>
                        <td align="center">Release Time</td>
                        <td align="center">State</td>
                        <td align="center">Operation</td>
                    </tr>
                    <?php
                    $listSize = 5;
                    if (empty($_GET["page"])||$_GET["page"]<1) {
                        header("Location:manageProperty.php?page=1");
                        exit;
                    } else {
                        $page = $_GET["page"];
                        $offset = ($page - 1) * $listSize;
                        require("conn/connect.php");
                        $sql_count="select count(i_property) num from studentroom.t_property";
                        $result_count = my_query($sql_count);
                        $total=$result_count[0]['num'];
                        if ($total!=0&&$total<=$offset){
                            $page=floor($total/$listSize);
                            if($total%$listSize>0){
                                $page++;
                            }
                            header("Location: manageProperty.php?page=".$page);
                            exit;
                        }
                        $sql = "select * from studentroom.t_property t limit ".$offset.",".$listSize;
                        // 结果集
                        $result = my_query($sql);
                        $num = count($result);
                        for ($i = 0; $i < $num; $i++) {
                            $state = $result[$i]['state']==1?'For Rent':'Deleted';
                            echo '<tr>';
                            echo ' <td align="center">' . $result[$i]['i_property'] . '</td>
                                   <td align="center">' . $result[$i]['i_owner'] . '</td>
                                   <td align="center">' . $result[$i]['owner_name'] . '</td>
                                   <td align="center">' . $result[$i]['phone'] . '</td>
                                   <td align="center">' . $result[$i]['email'] . '</td>
                                   <td align="center">' . $result[$i]['release_date'] . '</td>
                                   <td align="center">' . $state . '</td>
                                   <td align="center">';
                            if ( $result[$i]['state']==1){
                                echo '<input type="button" value="delete" >';
                            }
                            echo '</td></tr>';
                        }
                        if ($offset>0){
                            echo ' </table><a href="manageProperty.php?page='.($page-1).'">PREVIOUS</a>';
                        }else{
                            echo ' </table><a>PREVIOUS</a>';
                        }
                        echo ' page '.$page.' ';
                        if ($page*$listSize<$total){
                            echo '<a href="manageProperty.php?page='.($page+1).'">NEXT</a>';
                        }else{
                            echo '<a>NEXT</a>';
                        }
                    }
                    ?>
            </fieldset>
        </form>
    </div>
</div>
</body>
<script src="js/jquery-3.3.1.min.js"></script>
<script>
    $("#tab").click(function(event) {
        let chooseRow = event.target.parentElement.parentElement.rowIndex;
        let propertyId = $("#tab tr:eq("+chooseRow+") td:nth-child("+1+")").html().trim();
        if ($(event.target).val()== "delete") {
            if(confirm('sure delete?'))
                location.href ='managePropertyDo.php?head=delete&propertyId='+propertyId;
        }
    });
</script>
</html>

