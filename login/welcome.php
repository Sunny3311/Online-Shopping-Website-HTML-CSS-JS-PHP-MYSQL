<?php

session_start();
if(!isset($_SESSION['loggedin'])  || $_SESSION['loggedin'] !==true)
{
header("location: login.php");
}

?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login</title>
    <link rel="stylesheet" href="/project/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        body{
            background-image: url("/project/images/bg/loginbg.png");
        }
        h3{
            padding-top: 20%;
            padding-bottom: 10%;
            text-align: center;
            /* font-size: larger; */
        }
         .form-group {
            width: 10%;
            height: 0vh;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            padding-left: 45%;
            padding-top: 2%;
            padding-bottom: 2%;
        }
        .form-group label{
            padding-top: 5%;
            padding-bottom: 5%;
        }
        .form-group input{
            padding: 1% 1%;
            padding-right: 50%;   
        }
        button{
            background-color: rgb(211, 7, 7);
            background-size: cover;
            color: white;
            opacity: 1;
            transition: 0.3s all;
            width: 140px;
            height: 30px;
            justify-content: center;
            font-size: large;
            border-radius: 6px;
            font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            cursor: pointer;
            margin-top: 5%;
            margin-left: 45%;
        }
        hr{
            padding-bottom: 8%;
        }
    </style>
</head>
<body>
 
 <nav class="menu-bar fixed-top">
    <a href="home.html"><img src="\project\images\logos\logo.jpg" alt="logo" align="left" width="65px" height="65px"> </a>
    <ul>
    <li><a href="\project\home.html"><i class="fa-solid fa-house"></i>Home</a></li>
    <li class='active' ><a href="#"><i class="fa-solid fa-user-tie"></i> Profile</a>
        <div class="sub-menu-1">
            <ul>
                <li class="hover-me"><a href="login.php">Login</a>
                </li>
                <li class="hover-me"><a href="signup.php">Signup</a>
                </li>
                <li class="hover-me"><a href="logout.php">Logout</a>
                </li>

            </ul>
        </div>
    </li>
    <li><a href="#categories"><i class="fa-solid fa-align-justify"></i>Categories</a>
        <div class="sub-menu-1">
            <ul>
                <li class="hover-me"><a href="\project\mens.html"><i class="fa-solid fa-person"></i>Mens</a>
                </li>
                <li class="hover-me"><a href="\project\womens.html"><i class="fa-solid fa-person-dress"></i>Womens</a>
                </li>

            </ul>
        </div>
    </li>
    <!-- <li><a href="#about">About Us </a></li> -->
    <li><a href="\project\my_cart.html"><i class="fa-solid fa-cart-arrow-down"></i>MY Cart </a></li>
    
    <li><a href="#"> <i class="fa-solid fa-user-check"></i> <?php echo "Welcome ". $_SESSION['username']?> </a></li>
  </ul>
  <form>
  <label><i class="fa-solid fa-magnifying-glass"></i></label>
  <input type="text" name="search"/>
  <span><input type="submit" value="Search" /></span>
  </form>
 </nav>

   
   <h3><?php echo "Welcome ". $_SESSION['username']?> ! Shop your favourite style</h3>
   <a href="\project\home.html"> <button>Back to Home</button> </a>
   <hr>


      



 <footer>
                <div class="row">
                 <ul>
                    <div class="footer-one">
                   
                    <li><a href="home.html"><img class="logo" src="\project\images\logos\logo2.jpg" alt="logo2"  width="65px" height="65px"><h4>SARYA</h4> </a>
                        <p>If you would like to experience <br> the best of online shopping for <br> men and women in India, <br> you are at the right place. <br> Sarya is the ultimate destination for fashion.</p>
                     </li> 
                
                    </div>
                    <div class="footer-two">
                        <h4>Featured </h4>
                             
                            <li><a href="\project\mens.html">Mens</a></li>
                            <li><a href="\project\womens.html">Womens</a></li>
                            <li><a href="\project\allproducts.html">New Arrivals</a></li>
                     </div>
                     <div class="contact">
                      <h4>Contact Us</h4>
                      <li><a href="#email">Email</a></li>
                      <li><a href="#facebook">Facebook</a></li>
                      <li><a href="#twitter">Twitter</a></li>
                      <li><a href="#instagram">Instagram</a></li>
                     </div>
                     <div class="about-us">
                     <h4>About Us</h4>
                     <p><strong>SARYA</strong> ,India’s no.1 online fashion <br> destination justifies its fashion <br> relevance by bringing something <br> new and chic to the <br> table on the daily.</p>
                     </div>
                 </ul>
                 </div>
                  <div class="payment">
                      <ul>
                     <li class="visa">
                         <i class="fa-brands fa-cc-visa"></i>
                         <i class="fa-brands fa-cc-mastercard"></i>
                         <i class="fa-brands fa-cc-paypal"></i></li>
                    <li><p>SARYA eCommerce &copy; 2022. All Rights Reserved</p></li>
                    <li class="social">
                     <a href="#"><i class="fa-brands fa-facebook"></i></a>
                     <a href="#"><i class="fa-brands fa-twitter"></i></a>
                     <a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                 </ul>
                 </div>
 </footer>


</body>
</html>



    
