<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>contract</title>
    <link rel="stylesheet" href="css/style.css">



    <style type="text/css">
        #button1{
            positoin:absolute;
            margin-left: 0px;
            margin-rigth:0px;
            margin-bottom: 0px;
            width: 60px;
        }
        #button2{
            positoin:relative;
            margin-left: 0px;
            margin-rigth:0px;
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
        <form action="aaaa.php" method="get" name="upload">
            <fieldset>
             <table border="1" width="900px">
                 <tr><td colspan="5" align="center"><h3><b>Upload Contract </b></h3></td></tr>
                 <tr>
                     <td align="center">Column 1</td>
                     <td align="center">Column 2</td>
                     <td align="center">Column 3</td>
                     <td colspan="2" align="center">操作</td>
                 </tr>
                 <tr>
                     <td align="center">hhhhhhhh</td>
                     <td align="center">hhhhhhhh</td>
                     <td align="center">hhhhhhhh</td>
                     <td align="center" width="60px"><input type="file" id="txtfilePath" name="txtfilePath" style="display:none;"><input type="button" id="button1" onclick="txtfilePath.click()" value="upload"></td>
                     <td align="center" width="60px"><input type="button" id="button2" value="auditing"></td>
                 </tr>
             </table>
            </fieldset>
        </form>
    </div>
</div>
<script>
    document.getElementById("txtfilePath").onchange = function() {

        document.getElementById("filePath").value = this.value;
    }
</script>
</body>
</html>