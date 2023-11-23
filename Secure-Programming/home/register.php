<?php
    session_start();
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


    <!-- //   if (isset($_SESSION['error_message'])) {
    //     $error_message = $_SESSION['error_message'];
    //     unset($_SESSION['error_message']);
    //  } -->




<body>
    <form action="../controllers/registercontrol.php" method="POST">
        <h2>BECOME A MUNYUKERS</h2>

        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo htmlspecialchars($_GET['error']); ?></p>
        <?php } ?>
        


        
        <!-- <label for="profile_pic">Profile Picture:</label> -->
        
        <!-- profile picture -->
        <!-- <input type="file" name="profile_pic" required><br> -->

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <!-- <label for="confirmPassword">Confirm Password:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required>
        <br> -->
        <label for="gender">Gender:</label>
        <input type="gender" id="gender" name="gender" required>
        <br>
        <label for="favorite_player">Favorite Player:</label>
         <input type="text" name="favorite_player" required><br>
        <label for="age">Age:</label>
        <input type="number" name="age" required><br>
        <button type="submit">Register</button>
    </form>
</body>

</html>
