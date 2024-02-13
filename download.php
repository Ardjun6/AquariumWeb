<?php
// Ensure that the image parameter is set and not empty
if (isset($_GET['image']) && !empty($_GET['image'])) {
    $imageFileName = $_GET['image'];

    // Define the path to the directory where your images are stored
    $imageDirectory = './images/';

    // Construct the full path to the image file
    $imagePath = $imageDirectory . $imageFileName;

    // Check if the image file exists
    if (file_exists($imagePath)) {
        // Set the appropriate headers for a file download
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $imageFileName . '"');
        header('Content-Length: ' . filesize($imagePath));

        // Read and output the image file
        readfile($imagePath);

        exit;
    } else {
        // Image not found
        die('Image not found.');
    }
} else {
    // Invalid request
    die('Invalid request.');
}
?>
!   