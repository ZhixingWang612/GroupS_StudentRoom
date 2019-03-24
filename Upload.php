<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>uplode</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
require 'pagehead.php';
?>
<div class="main">
    <br><br>
    <div class="Upload">
        <form action="UploadDo.php" method="post" enctype="multipart/form-data" name="upload">
            <fieldset>
                <h3><b>Your Perpory</b></h3><br>
                <p><b>Address line1</b></p>
                <input type="text" name="address1"><br>
                <p><b>Address line2</b></p>
                <input type="text" name="address2"><br>
                <p><b>Post Code</b></p>
                <input type="text" name="post-code"><br>
                <p><b>Summary</b></p>
                <textarea rows="4" name="Summary" style="width: 90%;margin-left: 20px;margin-bottom: 20px;resize:none;">
                </textarea><br>
                <p><b>Description</b></p>
                <textarea rows="4" name="description"
                          style="width: 90%;margin-left: 20px;margin-bottom: 20px;resize:none;">
                </textarea><br>
                <p><b>Please upload your certificate(s)</b></p>
                <input type="text" class="yourClassName" name="filePath"  id="filePath" readonly="true"/>
                <input type="file" id="txtfilePath" accept="image/jpeg" name="certificate" style="display:none;">
                <input type="button" onclick="txtfilePath.click()" id="fileup"
                       value="click here to upload your certificate">
                <br>

                <input type="button" id="btn" value="please upload 4 pictures of your hourse" onclick="choosePics()">

                <input type="file"  multiple  accept="image/jpeg" name="pics[]" id="pics" style="display: none"/>

                <button type="submit"><b>Upload</b></button>


            </fieldset>
        </form>
    </div>
</div>
<script>
    document.getElementById("txtfilePath").onchange = function () {
        document.getElementById("filePath").value = this.value;
    }
    document.getElementById("pics").onchange = function () {
        var len = this.files.length;



        document.getElementById("btn").value = len+ " pictures have been chosen";
    }

    function choosePics() {
        document.getElementById("pics").click();
    }

</script>
</body>
</html>