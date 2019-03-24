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


    $arr = array("1" => "waitting for landlord's decision",
        "10" => "closed by landlord ",
        "11" => "waitting for student's decision ",
        "21" => "uploading contract",
        "20" => "closed by student",
        "3" => "waitting for landlord's Signature",
        "31" => "waitting for student's Signature",
        "30" => "closed by landlord ",
        "41" => "in audit",
        "40" => "closed by student",
        "51" => "effective",
        "50" => "audit failed");

    require("conn/connect.php");
    $sessionId = "1";
    if (!empty($_SESSION['id'])) {
        $sessionId = $_SESSION['id'];
    }

    if (empty($_GET["contractID"])) {
        //重定向浏览器
        header("Location: OrderList.php?page=1");

        //确保重定向后，后续代码不会被执行
        exit;
    } else {
        $constractID = $_GET["contractID"];
        $sql = "select * from studentroom.t_order where i_order=" . $constractID;

        $orders = my_query($sql);
        //print_r($orders);
        if ($orders) {
            $sql = "select * from studentroom.t_user where i_user=" . $orders[0]["i_landlord"];
            $landlords = my_query($sql);
            //  print_r($landlords);
            $sql = "select * from studentroom.t_property where i_property=" . $orders[0]["i_property"];
            $propertys = my_query($sql);

            //    print_r($propertys);
            echo "<div class=\"EditYourProfile\" style=\"position: absolute;left: 50%;width:600px;\">
            <fieldset style='margin-left: -300px;'>
                <h2><b>Order Detail</b></h2><br>
                
                <br>
                <table border=\"1\" width=\"600px;\">
                    
                    <tr>
                        <td align=\"center\" style='width: 30%;'>Student</td>
                        <td align=\"center\">" . $orders[0]["name"] . "</td> 
                    </tr>
                    <tr>
                        <td align=\"center\">Landlord</td>
                        <td align=\"center\">" . $landlords[0]["first_name"] . "</td>                        
                    </tr>
                   
                    <tr>
                        <td align=\"center\">Property</td>
                        <td align=\"center\">" . $propertys[0]["address"] . "</td>

                        
                    </tr>
                    <tr>
                        <td align=\"center\">Apply Date</td>
                        <td align=\"center\">" . $orders[0]["apply_date"] . "</td>

                        
                    </tr>
                    <tr>
                        <td align=\"center\">Tenancy</td>
                        <td align=\"center\">" . $orders[0]["tanency"] . " Month</td>                       
                    </tr>
                    <tr>
                        <td align=\"center\">Rent Per Week</td>
                        <td align=\"center\">" . $propertys[0]["rent_per_week"] . "</td>                      
                    </tr>
                    <tr>
                        <td align=\"center\">Bill included</td>
                        <td align=\"center\">" . ($orders[0]["bill_included"] == 1 ? "YES" : "NO") . "</td>                       
                    </tr>
                    
                    <tr>
                        <td align=\"center\">State</td>
                        <td align=\"center\">" . $arr[$orders[0]["state"]] . "</td>                        
                    </tr>
                     
                 </table>
            </fieldset></div>";
        } else {

        }
    }
    ?>
</div>

</div>

</body>


</html>