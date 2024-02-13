<?php
// Database connection
$conn = new mysqli("localhost", "acr_school", "Shai2991", "acr_Portfolio");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if product ID is provided in the URL parameters
if(isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Prepare a delete statement
    $sql = "DELETE FROM images_for_sale WHERE id = ?";

    if($stmt = $conn->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("i", $productId);

        // Attempt to execute the prepared statement
        if($stmt->execute()){
            // Product deleted successfully, redirect to shop page
            header("Location: shop.php");
            exit();
        } else{
            echo "Error deleting product.";
        }
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
