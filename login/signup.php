<?php
require_once "config.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
    }
    else{
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken"; 
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }

    mysqli_stmt_close($stmt);


// Check for password
if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password'])) < 5){
    $password_err = "Password cannot be less than 5 characters";
}
else{
    $password = trim($_POST['password']);
}

// Check for confirm password field
if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
    $password_err = "Passwords should match";
}


// If there were no errors, go ahead and insert into the database

if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
{
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

        // Set these parameters
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
            header("location: login.php");
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
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

    <title>Signup</title>
    <link rel="stylesheet" href="/project/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        body{
            background-image: url("/project/images/bg/loginbg.png");
        }
        h1{
            padding-top: 10%;
            text-align: center;
        }
        p{
            text-align: center;
        }
        .form-group{
            width: 100%;
            height: 5vh;
            background-size: cover;
            background-position: top center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            display: flex;
            align-items: center; 
            padding-left: 40%;
        }
        .form-group label{
            padding-right: 80px;
        }
        .form-group input{
            padding: 3px 3px;   
        }
        button{
            background-color: rgb(211, 7, 7);
            background-size: cover;
            color: white;
            opacity: 1;
            transition: 0.3s all;
            width: 150px;
            height: 40px;
            justify-content: center;
            font-size: large;
            border-radius: 6px;
            font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            cursor: pointer;
            margin-left: 610px;
        }
        .already-login a{
            color: black;
            padding-left: 45%;
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
    
  </ul>
  <form>
  <label><i class="fa-solid fa-magnifying-glass"></i></label>
  <input type="text" name="search"/>
  <span><input type="submit" value="Search" /></span>
  </form>
 </nav>

                            <!-- Signup Form -->

 <h1>Sign Up</h1>
 <p>It's quick and easy.</p>
 <hr>
 <form action="" method="post">
   <div class="form-row">
     <div class="form-group col-md-6">
        <label for="inputEmail4">Username </label>
        <input type="text" class="form-control" name="username" id="inputEmail4" placeholder="User Name">
     </div>
     <div class="form-group col-md-6">
        <label for="inputPassword4">Password</label>
        <input type="password" class="form-control" name ="password" id="inputpassword4" placeholder="Password">
     </div>
     <div class="form-group">
        <label for="inputPassword4">Confirm Password</label>
        <input type="password" class="form-control" name ="confirm_password" id="inputPassword" placeholder="Confirm Password">
     </div>
     <div class="form-group">
       <label for="inputAddress2">Address</label>
       <input type="text" class="form-control" id="inputAddress2" placeholder="Area, Road, Colony">
     </div>
     <div class="form-group col-md-6">
       <label for="inputCity">City</label>
       <input type="text" class="form-control" id="inputCity">
     </div>
     <div class="form-group col-md-4">
       <label for="inputState">State</label>
       <input type="text" class="form-control" id="inputCity">
     </div>
     <div class="form-group">
       <input class="form-check-input" type="checkbox" id="gridCheck">
       <label class="form-check-label" for="gridCheck">
        Check me out
       </label>
     </div>
       <button type="submit" class="btn btn-primary">Sign Up</button>
  </div>
 </form>
 
    <div class="already-login" >
      <a href="login.php"><strong>Login. Already a customer?</strong></a>
    </div>
     




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