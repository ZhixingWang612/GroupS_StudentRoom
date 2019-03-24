<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment3</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="menu">
    <div>
        <h1>StudentRoom</h1>
    </div>
    <div>
        <ul>
            <li><img src="img/Head.jpg" alt="None"></li>
            <li>MR. Kelon Huang</li>
            <Li>
                <div class="Dropdown">
                    <button class="menu1">Menu</button>
                    <div class="Dropdown_content" style="display: none">
                        <a href="Login.html">Log in</a>
                        <a href="Signin.html">Sign Up</a>
                        <a href="YourAccount.html">Your Account</a>
                        <a href="">Your Booking</a>
                        <a href="">Viewing History</a>
                        <a href="Payment1.html">Payment</a>
                        <a href="">Log out</a>
                    </div>
                </div>
            </Li>
        </ul>
    </div>
</div>
<div class="main">
    <br><br>
    <div class="Payment3">
        <form action="aaaa.php" method="get" name="Login">
            <fieldset>
                <h2><b>Please Enter your Payment Deatil</b></h2><br>
                <p><b>Card Number</b></p>
                <input type="number" name="card number"><br>
                <p><b>Name</b></p>
                <input type="name" name="name"><br>
                <p><b>Exp</b></p>
                <input type="date" name="exp"><br>
                <p><b>CVC</b></p>
                <input type="number" name="cvc"><br>
                <button><b>Process</b></button>
            </fieldset>
        </form>

    </div>

</div>



<script>


    let menu = document.getElementsByClassName("menu1")[0];
    let Dropdown_content = document.getElementsByClassName("Dropdown_content")[0]
    let flag = true;
    menu.addEventListener('click',function(){

        if(flag == true){
            Dropdown_content.style.display = "block";
            flag = false;
        }else{
            Dropdown_content.style.display = "none";
            flag = true;
        }
    },false);



</script>
</body>
</html>