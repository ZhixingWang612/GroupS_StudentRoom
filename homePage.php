<?php
session_start();
//header('Content-type:text/html;charset=utf-8');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>homePage</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/homePage.css">
</head>
<body>
<?php
    require 'pagehead.php';
?>
<div class="main">
    <br><br>
    <div class="condition">
        <!--<form action="aaaa.php" method="post" name="Login">-->
        <!--<fieldset>-->
        <div class="queryCondition">
            <br>
            <h1> Find suitable homes and Experiences</h1>
        </div>
        <div class="address">
            <h3> where will you study</h3>
        </div>
        <input type="test" class="addressInput" id="address">
        <div class="Bedroom">
            <h3>Bedroom(s)</h3>
            <select name="bedroomNumber" style="width: 100px;height: 25px" id="bedroomNumber">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
            </select>
        </div>

        <div class="Bathroom">
            <h3>Bathroom(s)</h3>
            <select name="bathroomNumber" style="width: 100px;height: 25px" id="bathroomNumber">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
            </select>
        </div>
        <div class="price">
            <h3>Price per week</h3>
            <input type="range" class="range" id="price">
        </div>
        <input type="button" value="For Sale" class="saleBtn">
        <input type="button" value="To Rent" class="rentBtn"  id="rentBtn">

    </div>

</div>

</body>
<script src="js/jquery-3.3.1.min.js"></script>
<script>
    $("#rentBtn").click(function () {
        var addressVal = $("#address").val();
        var bedroomNumberVal = $("#bedroomNumber").val();
        var bathroomNumberVal = $("#bathroomNumber").val();
        var priceVal = $("#price").val();
        location.href = "searchroom.php?addressVal="+addressVal+'&bedroomNumber='+bedroomNumberVal+'&bathroomNumberVal='+bathroomNumberVal+'&priceVal='+priceVal
    });

</script>
</html>