<html>
<head>
</head>
<body>
<div class="menu">
    <div>
        <h1>StudentRoom</h1>
    </div>
        <?php
            if(isset($_SESSION['id'])){
                $str = "welcome!";
                switch ($_SESSION['type']){
                    case 1:
                        $str .= "student";
                        break;
                    case 2:
                        $str .= "landlord";
                        break;
                    case 3:
                        $str .= "admin";
                        break;
                    case 4:
                        $str .= "legal advisor";
                        break;
                }
                $name=$_SESSION['name'];
                $imgPath = $_SESSION["picture"];
                echo "
                     <div>
                        <ul>
                            <li><img src='img/$imgPath'></li>
                            <li>";
                echo "$str.$name";
                echo "</li>
                            <Li>
                                <div class='Dropdown'>
                                    <button class='menu1' >Menu</button>
                                    <div class='Dropdown_content' style='display: none'>";

                $str = "welcome!";
                switch ($_SESSION['type']){
                    case 1:

                        echo "              
                                 <a href='homePage.php'>Home Page</a>
                                 <a href='YourAccount.php'>Your Account</a>
                                 <a href='ReservationRecord.php'>Your Booking</a>
                                 <a href='Validate.php'>TO BE LANDLORD</a>
                                 <a href='Payment1.php'>Payment</a>";
                        break;
                    case 2:

                        echo "<a href='YourAccount.php'>Your Account</a>
                              <a href='landlordsearchroom.php'>Your Property</a>
                              <a href='LandlordReservationRecord.php'>Manage Order</a>
                              <a href='Upload.php'>To Sale</a>";
                        break;
                    case 3:

                        echo "<a href='manageProperty.php'>Manage Property</a>
                                 <a href='auditing.php'>Auditing</a>
                                 ";
                        break;
                    case 4:
                        echo "<a href='OrderList.php'>Order Query</a>";
                        break;
                }
                echo " 
                                 <a href='changepassword.php'>Change PassWord</a>
                                 <a href='logout.php'>Log out</a>
                                    </div>
                                </div>
                            </Li>
                        </ul>
                    </div>
                ";
            }else{
                echo " 
                  <div>
                        <select name='language' class='language'>
                            <option>language</option>
                            <option>English</option>
                            <option>Chinese</option>
                            <option>Japanese</option>
                        </select>
                        <ul>
                        <li><button><a href='Login.php'>Login</a></button></li>
                        <li><button><a href='signin.php'>Signup</a></button></li>
                        <Li><button>Help</button></Li>
                        </ul>
                </div>";
            }
        ?>
</div>

</body>

<script >
    let menu = document.getElementsByClassName("menu1")[0];
    if(!(typeof menu == "undefined" || menu == null || menu == "")){
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
    },false); }
</script>

</html>