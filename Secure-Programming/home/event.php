<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event</title>
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
    
    <link rel="stylesheet" href="../style/event.css">
</head>
<body>
    <!--Tinggal Tambah di Navbar Brok-->
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

    <div class = "judul">
        <h1>Upcoming Clash!</h1>
    </div>

    <div class="container">
        <h2>Matchday (H)</h2>
            <ul class="event-list">
                 <li>
                     <div class="event">
                        <h3>Manchester United VS Manchester City</h3>
                        <p>Type : Premier League</p>
                        <p>Location : Lorong Jaya</p>
                        <p>Date : 28 Desember 2023</p>
                     </div>
                </li>
            </ul>
    </div>

    <div class="container2">
        <h2>Matchday (H)</h2>
            <ul class="event-list1">
                 <li>
                     <div class="event1">
                        <h3>Manchester United VS <br>FC Barcelona</h3>
                        <p> Type : UCL </p>
                        <p>Location : Kost Mandala</p>
                        <p>Date : 11 Januari 2024</p>
                     </div>
                </li>
            </ul>
    </div>

    <div class="container3">
        <h2>Matchday (A)</h2>
            <ul class="event-list2">
                 <li>
                     <div class="event2">
                        <h3>Manchester United VS <br>Persija Jakarta</h3>
                        <p> Type : Club World Cup </p>
                        <p>Location : Stadion GBK</p>
                        <p>Date : 25 Januari 2024</p>
                     </div>
                </li>
            </ul>
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