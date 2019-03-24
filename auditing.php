<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>auditing</title>
    <link rel="stylesheet" href="css\style.css">
</head>
<body>
<?php
    require 'pagehead.php';
?>
<div class="main">
    <br><br>
    <div class="Contract">
        <form action="auditingDo.php" method="get">
            <fieldset>
                <table border="1" width="900px" id="tab">
                    <tr>
                        <td colspan="9" align="center"><h3><b> Audit applications</b></h3></td>
                    </tr>
                    <tr>
                        <td align="center">Apply ID</td>
                        <td align="center">User ID</td>
                        <td align="center">Property Img</td>
                        <td align="center">Certificate</td>
                        <td align="center">ID Number</td>
                        <td align="center">Apply Time</td>
                        <td align="center">Auditing Time</td>
                        <td align="center">State</td>
                        <td align="center">Operation</td>
                    </tr>
                    <?php
                    $listSize = 5;
                    if (empty($_GET["page"])||$_GET["page"]<1) {
                        header("Location:auditing.php?page=1");
                        exit;
                    } else {
                        $page = $_GET["page"];
                        $offset = ($page - 1) * $listSize;
                        require("conn/connect.php");
                        $sql_count="select count(i_apply) num from studentroom.t_apply";
                        $result_count = my_query($sql_count);
                        $total=$result_count[0]['num'];
                        if ($total!=0&&$total<=$offset){
                            $page=floor($total/$listSize);
                            if($total%$listSize>0){
                                $page++;
                            }
                            header("Location: auditing.php?page=".$page);
                            exit;
                        }
                        $sql = "select * from studentroom.t_apply t limit ".$offset.",".$listSize;
                        // Results
                        $result = my_query($sql);
                        $num = count($result);
                        for ($i = 0; $i < $num; $i++) {
                            $state = $result[$i]['state']==0?'pending':($result[$i]['state']==1?'pass':'no pass');
                            echo '<tr>';
                            echo ' <td align="center">' . $result[$i]['i_apply'] . '</td>
                                   <td align="center">' . $result[$i]['i_user'] . '</td>
                                   <td align="center"><a target="_blank" href="file\\' . $result[$i]['property_img'] . '">look</a></td>
                                   <td align="center"><a target="_blank" href="file\\' . $result[$i]['certificate'] . '">look</a></td>
                                   <td align="center">' . $result[$i]['id_number'] . '</td>
                                   <td align="center">' . $result[$i]['apply_time'] . '</td>
                                   <td align="center">' . $result[$i]['auditing_time'] . '</td>
                                   <td align="center">' . $state . '</td>
                                   <td align="center">';
                                    if ( $result[$i]['state']==0){
                                        echo '<input type="button" class="pass" value="pass" apllyId = '.
                                        $result[$i]['i_apply']
                                          .  '><input type="button" class="no_pass" value="no pass" apllyId = '.
                                            $result[$i]['i_apply']
                                            .'>';
                                    }
                            echo '</td></tr>';
                        }

                        if ($offset>0){
                            echo ' </table><a href="auditing.php?page='.($page-1).'">PREVIOUS</a>';
                        }else{
                            echo ' </table><a>PREVIOUS</a>';
                        }
                        echo ' page '.$page.' ';
                        if ($page*$listSize<$total){
                            echo '<a href="auditing.php?page='.($page+1).'">NEXT</a>';
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
        let applyId = $("#tab tr:eq("+chooseRow+") td:nth-child("+1+")").html().trim();
        if ($(event.target).val()== "pass") {
            if(confirm('sure pass?'))
            location.href ='auditingDo.php?head=pass&applyId='+applyId;
        }else if ($(event.target).val()== "no pass") {
            if(confirm('sure no pass?'))
            location.href ='auditingDo.php?head=no&applyId='+applyId;
        }
    });
</script>
</html>

