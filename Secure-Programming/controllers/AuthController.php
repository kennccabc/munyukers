<?php
session_start();
require "./connection.php";

function check_empty($string): bool {
    return strlen($string) < 1;
}

function doLogin($username, $password) {
    global $conn;

    $query = "SELECT * FROM users WHERE username=?" ;
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();

        // Use password_verify to check if the entered password matches the stored hashed password
        if (password_verify($password, $data["password"])) {
            return $data;
        }
    }
        
    return false;
}


if(!isset($_SESSION['attempt'])){
    $_SESSION['attempt'] = 0;
}

//check if there are 3 attempts already
if($_SESSION['attempt'] == 3){
    $_SESSION['error'] = 'Attempt limit reach';
}
else{

//Session Timeout
$session_timeout = 1800;

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $session_timeout)){
    session_unset();
    session_destroy();
    header("Location : login.php");
}

$_SESSION['last_activity'] = time();


if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_SESSION['login_token']) && $_SESSION['login_token'] == $_POST['token']) {

    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
   
    $login_result = doLogin($username, $password);

    if (check_empty($username) || check_empty($password)) {
        $_SESSION['error'] = "All fields must be filled!";
    } else if ($login_result == false) {
        $_SESSION['attempt'] += 1;
        if($_SESSION['attempt'] == 3){
            $_SESSION['attempt_again'] = time() + (5*60);
        }
        // incrementLoginAttempts();
        $_SESSION['error'] = "Wrong Username or Password!";
    } else {
        $_SESSION["success_message"] = "Welcome, $username";
        $_SESSION['is_login'] = true;
        $_SESSION["id"] = $data["id"];
        $_SESSION['username'] = $data["username"];
        unset($_SESSION['attempt']);

        header('Location: ../home/home.php');
        die();
    }

    if ($_SESSION['error'] == true) {
        header('Location: ../home/login.php');
    }
     }
}

?>
