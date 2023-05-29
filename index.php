<?php
    // Verifica che l'utente sia già loggato, in caso positivo va direttamente alla home
    include 'auth.php';
    if (checkAuth()) {
        header('Location: home.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Welcome!</title>
    <style>
        footer{
            pointer-events: none;
        }
    </style>
</head>
<body>
    
    <header>
        <div class="logo">
            <a href="index.php">Zalandus</a>
            
        </div>
        <nav>
            <ul>
                <li>I'm sorry, but u need to sign up/log in to see more! |=> </li>
                <li> <a style="pointer-events: visible;" href="login.php"> <i class="fas fa-user"></i></a></li>
            </ul>
        </nav>
        <div class="container">
            <a href="login.php"> <i class="fas fa-user"></i></a>
        </div>
    </header>

    <article class="main">
        <h4>Hello there!</h4>
        <h2>This should be my first</h2> 
        <h2>complete project</h2> 
        <br>
        <h1>E-Commerce site</h1>
        <p>I hope u enjoy my work, let's meet in Laravel world</p>
        
    </article>

    <article class="features">
        <div class="fe-box">
            <img src="f1.png" alt="">
            <h6>Free Shipping</h6>
        </div>
        <div class="fe-box">
            <img src="f2.png" alt="">
            <h6>Online Order</h6>
        </div>
        <div class="fe-box">
            <img src="f3.png" alt="">
            <h6>Save Money</h6>
        </div>
        <div class="fe-box">
            <img src="f4.png" alt="">
            <h6>Promotions</h6>
        </div>
        <div class="fe-box">
            <img src="f5.png" alt="">
            <h6>Happy Sell</h6>
        </div>
        <div class="fe-box">
            <img src="f6.png" alt="">
            <h6>F24/7 Support</h6>
        </div>
    </article>

    <section class="banner">
        <h4>Repair Services </h4>
        <h2>Up to <span>70% off </span>All t-Shirts & Accessories</h2>
    </section>

    <section class="newsletter">
        <div class="newstext">
            <h4>Sign Up For Free</h4>
            <p>Get E-mail updates about our latest shop and <span>special offers.</span> </p>
        </div>
        <a href="sign_up.php">Sign Up</a>
        
    </section>

    <footer>
        <div class="col">
            <h3 class="logo">Zalandus</h3> 
            <h4>Contact</h4>
            <p><strong>Address: </strong>Via Santa Sofia, 64, 95123, Catania</p>
            <p><strong>Phone: </strong> +39 3333 33333 </p> 
            <p><strong>Hours: </strong> 10:00 - 18:00, Lun - Sab</p>
            <div class="follow">
                <h4>Follow us</h4> 
                <div class="icon">
                    <i class="fab fa-github"></i> 
                    <i class="fab fa-twitter"></i> 
                    <i class="fab fa-instagram"></i> 
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>
        <div class="col">
            <h4>About</h4>
            <a href="#">About us</a>
            <a href="#">Delivery Information</a> 
            <a href="#">Privacy Policy</a> 
            <a href="#">Terms & Conditions</a> 
            <a href="#">Contact Us</a>
        </div>
        <div class="col">
            <h4>My Account</h4> 
            <a style="pointer-events: visible;" href="login.php">Sign In</a> 
            <a href="#">View Cart</a> 
            <a href="#">My Wishlist</a> 
            <a href="#">Track My Order</a> 
            <a href="#">Help</a>
        </div>
        <div class="copyright">
            <P> © 2023, Ecommerce Project, Mohamed Mohamed </p>
        </div>
        </div>
    </footer>
</body>
</html>