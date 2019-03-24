<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>validate</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<?php
session_start();
require 'pagehead.php';
?>
<div class="main">
    <br><br>
    <div class="Validate">
        <form action="Validate.php" id="uploadform" method="post" enctype="multipart/form-data">
            <fieldset>
                <h3><b>Your Information</b></h3><br>
                <p><b>Certificate(s)</b></p><br>
                <input type="text" name="filePath" id="filePath" readonly="true"/><br>
                <input type="file" id="certificate" name="certificate" style="display:none;">
                <input type="button" onclick="certificate.click()" value="click here to upload your certificate"><br>


                <!-- <input type="file" class="yourClassName" id="certificate" name="certificate">-->


                <p><b>ID Number</b></p><br>
                <input type="text" id="IdNumber" name="IdNumber"><br>


                <p><b>house photo(s)</b></p><br>
                <input type="text" name="file" id="file" readonly="true"/><br>
                <input type="file" id="housePhoto" name="housePhoto" style="display:none;">
                <input type="button" onclick="housePhoto.click()" value="click here to upload your house photo(s)"><br>

                <!-- <input type="file" class="yourClassName" id="housePhoto" name="housePhoto">-->

                <button type="submit" onclick="beforesubmit();"><b>Validate</b></button>
            </fieldset>
        </form>
    </div>


</div>


<script>
    document.getElementById("certificate").onchange = function () {

        document.getElementById("filePath").value = this.value;
    };

    document.getElementById("housePhoto").onchange = function () {

        document.getElementById("file").value = this.value;
    };


    function beforesubmit() {
        <?php
        session_start();
        if (empty($_SESSION["id"])){
            echo  "var userID=1;";
        }else{
            echo  "var userID=".$_SESSION["id"].";";
        }

        ?>
        document.getElementById("uploadform").action = "ValidateDo.php?userID=" + userID;
    }

</script>


</body>
</html>
