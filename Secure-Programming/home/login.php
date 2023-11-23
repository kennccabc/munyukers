<?php
    session_start();
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
        //echo "<div class='alert alert-error'>$error_message</div>";
        unset($_SESSION['error_message']);
    // } elseif (isset($_SESSION['success_message'])) {
    //     $success_message = $_SESSION['success_message'];
    //     echo "<div class='alert alert-success'>$success_message</div>";
    //     unset($_SESSION['error_message']);
     }
?>



<body>
<!-- <?php if (!empty($_SESSION['imagePath'])): ?>
            <img src="<?php echo ($_SESSION['imagePath']); ?>" alt="Uploaded Profile Picture">
        <?php endif; ?> -->


    <form action="../controllers/AuthController.php" method="POST">
        <h2>LOGIN MUNYUKERS</h2>

        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo htmlspecialchars($_GET['error']); ?></p>
        <?php } ?>
        
        
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
