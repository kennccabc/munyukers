<?php
session_start();
require "./connection.php";

// Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// Process form data when submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $username = $_POST["username"];
    $password =  password_hash($_POST["password"], PASSWORD_DEFAULT); //$_POST["password"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $favoritePlayer = $_POST["favorite_player"];
    $age = $_POST["age"];   

//    // $startSupporting = $_POST["start_supporting"];

//     // Upload profile picture
//     $targetDir = "../uploads/";
//     if (!is_dir($targetDir)) {
//         mkdir($targetDir, 0755, true);
//     }
//     $targetFile = $targetDir . basename($_FILES["profile_pic"]["name"]);

//     move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $targetFile);



    // Insert data into the database
    $sql = "INSERT INTO users (`id`,`username`, `password`, `email` , `Gender`,`favorite_player`, `age`) VALUES (?,?,?,?,?,?,?)";

    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("ssssssi", $id,$username, $password, $email,$gender,$favoritePlayer, $age);

// Execute the statement
if ($stmt->execute()) {
    echo "Registration successful!";
    // $_SESSION['imagePath'] = $targetFile;
    header('Location: ../home/login.php');
} else {
    echo "Error: " . $stmt->error;
    header('Location: ../register.php');
}

// Close the statement
$stmt->close();
}

// $conn->close();
?>
