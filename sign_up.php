<?php
    include('auth.php');
    // require_once 'auth.php';
    if (checkAuth()) {
        header("Location: home.php");
        exit;
    }   

    // Verifica l'esistenza di dati POST
    if (!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["name"]) && 
        !empty($_POST["surname"]) && !empty($_POST["confirm_password"]))
    {
        $error = array();
        $conn = mysqli_connect('localhost', 'root', '', 'hw1') or die(mysqli_error($conn));
        // $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

        # USERNAME
        // Controlla che l'username rispetti il pattern specificato
        if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['username'])) {
            $error[] = "Username non valido";
        } else {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            // Cerco se l'username esiste già o se appartiene a una delle 3 parole chiave indicate
            $query = "SELECT username FROM users WHERE username = '$username'";
            $res = mysqli_query($conn, $query);
            if (mysqli_num_rows($res) > 0) {
                $error[] = "Username già utilizzato";
            }
        }
        # PASSWORD
        if (strlen($_POST["password"]) < 8) {
            $error[] = "Caratteri password insufficienti";
        } 
        # CONFERMA PASSWORD
        if (strcmp($_POST["password"], $_POST["confirm_password"]) != 0) {
            $error[] = "Le password non coincidono";
        }
        # EMAIL
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = "Email non valida";
        } else {
            $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
            $res = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
            if (mysqli_num_rows($res) > 0) {
                $error[] = "Email già utilizzata";
            }
        }
        # REGISTRAZIONE NEL DATABASE
        if (count($error) == 0) {
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $surname = mysqli_real_escape_string($conn, $_POST['surname']);

            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $password = password_hash($password, PASSWORD_BCRYPT);

            $query = "INSERT INTO users(username, pass_word, nome, surname, email) VALUES('$username', '$password', '$name', '$surname', '$email')";
            
            if (mysqli_query($conn, $query)) {
                $_SESSION["ecom_username"] = $_POST["username"];
                $_SESSION["ecom_user_id"] = mysqli_insert_id($conn);
                mysqli_close($conn);
                header("Location: home.php");
                exit;
            } else {
                $error[] = "Errore di connessione al Database";
            }
        }

        mysqli_close($conn);
    }
    else if (isset($_POST["username"])) {
        $error = array("Riempi tutti i campi");
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="userSpaceStyle.css">
    <script src="signup.js" defer></script>

    <title>Registrati!</title>
</head>

<body>
    <header>
        <div class="logo">
            <a href="index.php">Zalandus</a> 
        </div>
    </header>


    <section class="login_sign">
        <main>
            <h2>Registrati, se non fatto</h2>
            <form id="sign_up" name='signup' method='post'  enctype="multipart/form-data" autocomplete="off">
                <p class="name">
                    <label>Nome <input type='text' name='name' <?php if(isset($_POST["name"])){echo "value=".$_POST["name"];} ?>></label>
                    <div class="hidden-form"><img src="close.svg"/><span>Devi inserire il tuo nome</span></div>
                </p>
                <p class="surname">
                    <label>Cognome <input type='text' name='surname' <?php if(isset($_POST["surname"])){echo "value=".$_POST["surname"];} ?>></label>
                    <div class="hidden-form"><img src="close.svg"/><span>Devi inserire il tuo cognome</span></div>
                </p>
                <p class="username">
                    <label>Username <input type='text' name='username' <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?>></label>
                    <div class="hidden-form"><img src="close.svg"/><span>Nome utente non disponibile</span></div>
                </p>
                <p class="email">
                    <label>Email <input id="email-sign" type='email' name='email' <?php if(isset($_POST["email"])){echo "value=".$_POST["email"];} ?>></label>
                    <div class="hidden-form"><img src="close.svg"/><span>Indirizzo email non valido</span></div>
                </p>
                <p class="password">
                    <label>Password <input type='password' name='password' <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>></label>
                    <div class="hidden-form"><img src="close.svg"/><span>Inserisci almeno 8 caratteri</span></div>
                </p>
                <p class="confirm_password">
                    <label>Confirm Password <input type='password' name='confirm_password' <?php if(isset($_POST["confirm_password"])){echo "value=".$_POST["confirm_password"];} ?>></label>
                    <div class="hidden-form"><img src="close.svg"/><span>Le password non coincidono</span></div>
                </p>
                <?php if(isset($error)) {
                    foreach($error as $err) {
                        echo "<p class='errori'><img src='close.svg'/><span>".$err."</span></p>";
                    }
                } ?>
                <p>
                    <label>&nbsp;<input id="send" value="Registrati" type='submit'></label>
                </p>
            </form>
            <div class="signupLink">
                <h4>Hai un account?</h4>
                <a href="login.php">Accedi</a>
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