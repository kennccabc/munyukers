<?php
    session_start();

function csrf_token()
    {
    $token = "";

    if (!isset($_SESSION['register_token'])) {
        $_SESSION['register_token'] = bin2hex(random_bytes(16));
    }

    $token = $_SESSION['register_token'];
    return $token;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/register.css">
    <title>Register</title>
</head>

<body>
    <form id="RegisterForm" action="../controllers/registercontrol.php" method="POST">
        <input type="hidden" name="token" id="token" value="<?= csrf_token() ?>">
        <h2>BECOME A MUNYUKERS</h2>

        <?php if (isset($_SESSION['error'])) { ?>
            <p class="error"><?php echo htmlspecialchars($_SESSION['error']); ?></p>
            
        <?php 
            unset($_SESSION["error"]);
        } 
        ?>

        <div class="error-message" id="errorMessage" ></div>
        
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <br>
        <label for="confirmpassword">Reenter Password:</label>
        <input type="password" id="confirmpassword" name="confirmpassword" required>
        <br>
        <label for="gender">Gender:</label>
        <input id="male" name="gender" value="male" type="radio">
        <label for="male">Male</label>
        <input id="female" name="gender" value="female" type="radio">
        <label for="female" >Female</label>
        <br>
        <label for="favorite_player">Favorite Player:</label>
        <input type="text" id="favorite_player" name="favorite_player" required>
        <br>
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required><br>
                   
        <button type="submit">Register</button>
    </form> 
    
</body>

</html>
