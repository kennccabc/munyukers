<?php
session_start();
require "./connection.php";

function check_empty($string): bool {
    return strlen($string) < 1;
}

function check_length($string, $min, $max): bool {
    return strlen($string) < $min || strlen($string) > $max;
}

function check_username($username, $conn): string {
    if (check_length($username, 5, 20)) {
        return "Username must be 5 - 20 characters!";
    }

    if (isset($_SESSION['logged_user'])) {
        if ($_SESSION['logged_user'] == $username) {
            return "";
        }
    }
    
    $query = "SELECT * FROM users WHERE username=?" ;
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return "Username must be unique!";
    }

    return "";
}

function check_email($email): string {
    if (substr($email, 0, 1) == '@' || substr($email, 0, 1) == '.' || substr_count($email, '@') > 1 || strpos($email, '.@') || strpos($email, '@.')) {
        return "Wrong Email format!";
    }
    return "";
}

function check_password($password, $conpass) {
    if (check_length($password, 9, 1000)) {
        return "Password must be more than 8 characters!";
    }
    if (!ctype_alnum($password)) {
        return "Password must be alphanumeric!";
    }
    if (!preg_match('/[a-z]/', $password)) {
        return "Password must contain at least one lowercase letter!";
    }  
    if (!preg_match('/[A-Z]/', $password)) {
        return "Password must contain at least one uppercase letter!";
    }  
    
    if (strcmp($password, $conpass) != 0) {
        return "Confirm Password doesn't match!";
    }

    return "";
}


// Process form data when submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['register_token']) && $_SESSION['register_token'] == $_POST['token']) {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : $username . $crunch_date;
    $confirmpass = isset($_POST['confirmpassword']) ? htmlspecialchars($_POST['confirmpassword']) : $password;
    $gender = isset($_POST['gender']) ? htmlspecialchars($_POST['gender']) : "";
    $favoritePlayer = htmlspecialchars($_POST['favorite_player']);
    $age = htmlspecialchars($_POST['age']);
    $username_val = check_username($username, $conn);
    $email_val = check_email($email);
    $password_val = check_password($password, $confirmpass);

    if (check_empty($username) || check_empty($email) || check_empty($password) || check_empty($confirmpass) || check_empty($gender) || check_empty($favoritePlayer) || check_empty($age)) {
        $_SESSION['error'] = "All fields must be filled!";
    } else if (strcmp($username_val, "") != 0) {
        $_SESSION['error'] = $username_val;
    } else if (strcmp($email_val, "") != 0) {
        $_SESSION['error'] = $email_val;
    } else if (strcmp($password_val, "") != 0) {
        $_SESSION['error'] = $password_val;
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (`id`,`username`, `password`, `email` , `Gender`,`favorite_player`, `age`) VALUES (?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssi", $id,$username, $password, $email,$gender,$favoritePlayer, $age);

        $stmt->execute();
        if (!isset($_SESSION['logged_user'])) {
            header('Location: ../home/login.php');
            die();
        }
    }
    if ($_SESSION['error'] == true) {
        header('Location: ../home/register.php');
    }
}
?>
