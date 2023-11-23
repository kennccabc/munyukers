<?php
session_start(); // Start the session
require "./connection.php";

// // Check if the user is logged in
// if (!isset($_SESSION['username'])) {
//     header("Location: binder.php");
//     exit();
// }

// Check if the form is submitted and a file is selected
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fileToUpload'])) {
    $file = $_FILES['fileToUpload'];

    // Validate the file
    if ($file['error'] === 0) {
        $allowed_type = ['image/jpeg', 'image/jpg', 'image/png'];
        $file_type = mime_content_type($file['tmp_name']);
        if(!in_array($file_type, $allowed_type)){
            echo 'Invalid Type';
        }elseif($file_size = ($file['size'] > 5 * 1000 * 1000)){
            echo 'File is to big';
        }else{
            // Specify the target directory to save the uploaded file
        $targetDir = __DIR__ . "/../uploads/";

        // Create the "uploads" directory if it doesn't exist
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0755, true);
        } else {
            chmod($targetDir, 0755); // Change the permissions of an existing directory to 755
        }
        }

        // Generate a unique filename for the uploaded file
        $filename = uniqid() . '_' . basename($file['name']);
        $targetPath = $targetDir . $filename;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            // File upload successful, perform additional tasks (e.g., save the filename to the database)
            $_SESSION['imagePath'] = $filename;
            // Redirect the user to forum.php
            echo  '<img src="../uploads/'. $filename.'"  alt="Uploaded Image">';
            // header("Location: ../home/forum.php");
            exit();
        } else {
            $errorMessage = "Error uploading file.";
        }
    } else {
        $errorMessage = "File upload error: " . $file['error'];
    }
} else {
    $errorMessage = "Invalid request.";
}
?>

