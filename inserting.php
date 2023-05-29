<?php
    /*******************************************************
        Inserimento nel database 
    ********************************************************/
    require_once 'auth.php';
    if (!checkAuth()) exit;

    if (isset($_POST)){
        $data = file_get_contents("php://input");
        $cart = json_decode($data, true);

        $conn = mysqli_connect('localhost', 'root', '', 'hw1') or die(mysqli_error($conn));

        $query = "SELECT nome, surname, email FROM users WHERE id = '".$_SESSION['ecom_user_id']."' ";
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
       
            $query = "INSERT INTO orders(user_id, product) VALUES('$_SESSION['ecom_user_id']', JSON_OBJECT('id', '$cart["id"]', 'title', '$cart["title"]', 'img', '$cart["image"]', 'price_unit', '$cart["price"]'))";
            # Se corretta, ritorna un JSON con {ok: true}
            if(mysqli_query($conn, $query) or die(mysqli_error($conn))) {
                echo json_encode(array('ok' => true));
                exit;
            }
           
        

        mysqli_close($conn);
    }

?>
