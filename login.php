<?php
    // Verifica che l'utente sia già loggato, in caso positivo va direttamente alla home
    include 'auth.php';
    if (checkAuth()) {
        header('Location: home.php');
        exit;
    }

    if (!empty($_POST["username"]) && !empty($_POST["password"]) )
    {
        // Se username e password sono stati inviati
        // Connessione al DB
        //$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
        $conn = mysqli_connect('localhost', 'root', '', 'hw1') or die(mysqli_error($conn));
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        // ID e Username per sessione, password per controllo
        $query = "SELECT * FROM users WHERE username = '".$username."' ";
        // Esecuzione
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
        
        if (mysqli_num_rows($res) > 0) {
            // Ritorna una sola riga, il che ci basta perché l'utente autenticato è solo uno
            $entry = mysqli_fetch_assoc($res);
            if (password_verify($_POST['password'], $entry['pass_word'])) 
            {
                // Imposto una sessione dell'utente
                $_SESSION["ecom_username"] = $entry['username'];
                $_SESSION["ecom_user_id"] = $entry['id'];
                header("Location: home.php");
                mysqli_free_result($res);
                mysqli_close($conn);
                exit;
            }
        }
        // Se l'utente non è stato trovato o la password non ha passato la verifica
        else
            $error = "Username e/o password errati.";
    }
    else if (isset($_POST["username"]) || isset($_POST["password"])) {
        // Se solo uno dei due è impostato
        $error = "Inserisci username e password.";
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
    <link rel="stylesheet" href="userSpaceStyle.css">
    <title>Login</title>
</head>
<body>
    
    <header>
        <div class="logo">
            <a href="index.php">Zalandus</a> 
        </div>
    </header>

    <section class="login_sign">

        <main>
            <h2>Login</h2>
            <form id="log" name='login_form' method='post'>
                <p>
                    <label>Username <input type='text' name='username' <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?> > </label>
                </p>
                <p>
                    <label>Password <input type='password' name='password' <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?> ></label>
                </p>
                <?php
                    // Verifica la presenza di errori
                    if (isset($error)) {
                        echo "<p class='errori'><img src='close.svg'/><span>".$error."</span></p>";
                    }
                ?>
                <p>
                    <label>&nbsp;<input id="send" value="Login" type='submit'></label>
                </p>
            </form>
            <div class="signupLink">
                <h4>Non hai un account?</h4>
                <a href="sign_up.php">Iscriviti ora!</a>
            </div>
        </main>
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
            <a style="pointer-events: visible;" href="login.php">Sign In</a> 
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