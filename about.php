<?php
include 'auth.php';
    if (!checkAuth()) {
        header('Location: login.php');
        exit;
    }
    $conn = mysqli_connect('localhost', 'root', '', 'hw1') or die(mysqli_error($conn));
    $query = "SELECT * FROM team";
    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="script.js" defer></script>
    <title>About me</title>
</head>
<body>
    
    <header>
        <div class="logo">
            <a href="home.php">Zalandus</a> 
        </div>
        <nav>
            <ul>
                <li> <a href="#" class="close"> <i class="fa-solid fa-circle-xmark"></i></a></li>
                <li> <a href="home.php"> Home</a></li>
                <li> <a href="shop.php"> Shop</a></li>
                <li> <a class="active" href="about.php"> About</a></li>
                <li> <a href="contact.php"> Contact</a></li>
                <li> <a href="cart.php"> <i class="fa-solid fa-cart-shopping"><i class="existence" class="fa-sharp fa-solid fa-location-pin"></i></i></a></li>
                <li> <a href="account.php"> <i class="fas fa-user"></i></a></li>
                <li> <a href="logout.php"> <i class="fa-solid fa-right-from-bracket"></i></a></li>
            </ul>
        </nav>
        <div class="container">
            <a href="cart.php"> <i class="fa-solid fa-cart-shopping"><i class="existence" class="fa-sharp fa-solid fa-location-pin"></i></i></a>
            <a href="account.php"> <i class="fas fa-user"></i></a>
            <a href="logout.php"> <i class="fa-solid fa-right-from-bracket"></i></a>
            <div class="burger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </header>

    <article class="shop-main">
        <h2>#Aboutpage</h2> 
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, voluptas. </p>
    </article>
    
    <marquee scrollamount="5" width="100%" scrolldelay="100"> 
        <p>Let's know a little bit about our team that created this website. We tried to do our best.</p>
    </marquee>
    <section>
        <div class= "flex-container" id="team">

            <?php while($row = mysqli_fetch_assoc($res)){ ?>
                <div>
                    <img src="<?php echo $row['char_image'];?>">
                    <h5> <?php echo $row['position'];?> </h5>
                    <h4> <span> <?php echo $row['surname']; ?></span> <span><?php echo $row['nome']; ?></span> </h4>
                    <p><?php echo $row['email']; ?></p>
                </div>
                <?php } 
            mysqli_free_result($res);
            mysqli_close($conn);?>
        </div>
    </section>

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
    
    <section class="newsletter">
        <div class="newstext">
            <h4>Sign Up For Newsletters</h4>
            <p>Get E-mail updates about our latest shop and <span>special offers.</span> </p>
        </div>
        <a href="#">Sign Up</a>
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
            <a href="about.php">About us</a>
            <a href="#">Delivery Information</a> 
            <a href="#">Privacy Policy</a> 
            <a href="#">Terms & Conditions</a> 
            <a href="contact.php">Contact Us</a>
        </div>
        <div class="col">
            <h4>My Account</h4> 
            <a href="account.php">Profile</a> 
            <a href="cart.php">View Cart</a> 
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