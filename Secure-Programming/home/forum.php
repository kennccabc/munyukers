<?php
session_start(); // Start the session

require "../controllers/connection.php";
// Check if the user is logged in
if (!isset($_SESSION['is_login'])) {
    header("Location: login.php");
    exit();
}

function csrf_token()
{
    $token = "";

    if (!isset($_SESSION['login_token'])) {
        $_SESSION['login_token'] = bin2hex(random_bytes(16));
    }

    $token = $_SESSION['login_token'];
    return $token;
}

//Session Timeout
$session_timeout = 1800;

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $session_timeout)){
    session_unset();
    session_destroy();
    header("Location : login.php");
}

$_SESSION['last_activity'] = time();
?>

<html>
<head>
    <title>Munyukers - Forum</title>
    <link rel="stylesheet" href="../style/forum.css" />
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
</head>

<body>
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
      </div>
    </div>

    <div class="upload-container">
        <h2>Upload Image</h2>
        <form action="../controllers/forumcontroller.php" method="post" enctype="multipart/form-data">
            <input type="file" name="fileToUpload" id="fileToUpload" accept=".jpg, .png, .jpeg">
            <!-- <input type="submit" value="Upload" name="submit"> -->

        <label for="discussion_title">Title:</label>
        <!-- <input type="text" id="discussion_title" name="discussion_title" required> -->

        <!-- <label for="discussion_content">Content:</label>
        <textarea id="discussion_content" name="discussion_content" required></textarea> -->
        <button type="submit">Create Discussion</button>
        </form>
  
        <!-- <div class="uploaded-image">
                    <img src="uploads/<?php echo $filename; ?>" alt="Uploaded Image">
                </div> -->

    </div>
</div>
<script>
      feather.replace();
    </script>

    <!-- JS -->
    <script src="../script/script.js"></script>
</body>
<footer>
      <div class="footer">
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