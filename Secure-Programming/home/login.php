<?php
    session_start();

    function csrf_token()
{
    $token = "";

    if (!isset($_SESSION['login_token'])) {
        $_SESSION['login_token'] = bin2hex(random_bytes(16));
    }

    $token = $_SESSION['login_token'];
    return $token;
}

if(isset($_SESSION['attempt_again'])){
    $now = time();
    if($now >= $_SESSION['attempt_again']){
        unset($_SESSION['attempt']);
        unset($_SESSION['attempt_again']);
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/login.css">
    <title>Login</title>
</head>

<?php
      if (isset($_SESSION['error_message'])) {
        $error_message = $_SESSION['error_message'];
        unset($_SESSION['error_message']);
     }
?>


<body>
    <form action="../controllers/AuthController.php" method="POST">
        <input type="hidden" name="token" id="token" value="<?= csrf_token() ?>">
        <h2>LOGIN MUNYUKERS</h2>

        <?php if (isset($_SESSION['error'])) { ?>
            <p class="error"><?php echo $_SESSION['error']; ?></p>
            
        <?php 
            unset($_SESSION["error"]);
        } 
        ?>
        
        
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit" class="submit-button">Login</button>
        <a href="register.php" class="button-link"><button type="button" class="register-button">Dont' have an account ? Register</button></a>
    </form>
</body>

</html>
