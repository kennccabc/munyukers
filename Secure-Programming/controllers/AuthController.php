<?php
session_start();
require "./connection.php";

// Check connection
// if (!$conn) {
//     echo 'connection failed';
//     die("Connection failed: " . $mysqli->connect_error);
// }





function doLogin($username, $password) {
    global $conn;

    $query = "SELECT * FROM users WHERE username=?" ;  //AND password=?"
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


if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $username = $_POST['username'];
    $password =  $_POST['password'];
   
    $login_result = doLogin($username, $password);

    //if ($login_result->num_rows == 1) {
    if ($login_result!== false) {
        //$data = $login_result->fetch_assoc();

        //echo 'Login Succesfull';

       $_SESSION["success_message"] = "Welcome, $username";
       $_SESSION['is_login'] = true;
       $_SESSION["id"] = $data["id"];
       $_SESSION['username'] = $data["username"];
       //$_SESSION["password"] = $data["password"];



    header("Location: ../home/home.php");
    
    }
    else {
        //echo 'Login failed';
        
        $_SESSION["error_message"] = "Login Failed.";

        header("Location: ../home/login.php?error=Login Failed. Incorrect Username and Password");
    }

}

?>
