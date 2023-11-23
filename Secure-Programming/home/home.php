<?php
  session_start();

  if ($_SESSION['is_login'] !== true) {
    header("Location: login.php");
  }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Munyukers</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
      rel="stylesheet"
    />
    <!-- Feather Icons -->
    <script src="path/to/dist/feather.js"></script>
    <!-- choose one -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <!-- Style -->
    <link rel="stylesheet" href="../style/home.css"
  </head>
  <body>
    <!-- Header start -->
    <div class="header">
      <a href="#" class="header-left">Munyukers</a>

      <div class="header-mid">
        <a href="home.php">Home</a>
        <a href="achievement.php">Achievement</a>
        <a href="event.php">Event</a>
        <a href="forum.php">Forum</a>
      </div>
      <div class="header-right">
        <!-- <a href="#" id="search"> <i data-feather="search"></i></a> -->
        <a href="#" id="hamburger-menu"> <i data-feather="menu"></i></a>
        <a href="logout.php">Log Out</a>
        <?php
          if (isset($_SESSION['success_message'])) {
            $success_message = $_SESSION['success_message'];
            echo "<div class='success_message'>$success_message</div>";
            unset($_SESSION['success_message']);
          }
        ?>
      </div>
    </div>
    
    <!-- Header end -->
    <div class="top-wrapper">
    <img src="../asset/logoemyu.png" class="logo" />
      <div class="container">
        <h1>Munyukers.</h1>
        <p>
          Welcome to Munyukers, Manchester United Fanbase Website!
        </p>
      </div>
    </div>

    <div class="bottom-wrapper">
      <div class="content">
        <div class="history">
          <h2>HISTORY</h2>
          <p>FOUNDED IN 1878 AS NEWTON HEATH L&YR FOOTBALL CLUB, OUR CLUB HAS OPERATED FOR OVER 140 YEARS. THE TEAM FIRST ENTERED THE ENGLISH FIRST DIVISION, THEN THE HIGHEST LEAGUE IN ENGLISH FOOTBALL, FOR THE START OF THE 1892-93 SEASON. OUR CLUB NAME CHANGED TO MANCHESTER UNITED FOOTBALL CLUB IN 1902, AND WE WON THE FIRST OF OUR 20 ENGLISH LEAGUE TITLES IN 1908. IN 1910, WE MOVED TO OLD TRAFFORD, OUR CURRENT STADIUM.</p>
        </div>
      </div>
      <div class="stadion">
          <h2>Old Trafford</h2>
          <img src="../asset/stadion.png" alt="oldtrafford" class="OldTrafford">
        </div>
    </div>
    <!-- Feather Icons -->
    <script>
      feather.replace();
    </script>

    <!-- JS -->
    <script src="../script/script.js"></script>
  </body>
  <footer>
      <div class="container">
        <h4>&copy; 2023 My E-commerce Store. All rights reserved.</h4>
        <div class="contact-info">
          <h2>Contact Information</h2>
          <p>Phone: +62 878-8572-3127</p>
          <p>Email: munyukers@gmail.com</p>
          <p>Address: peep Street, Jakarta, Indonesia</p>
        </div>
      </div>
    </footer>
</html>
