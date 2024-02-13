<?php
// Database connection
$conn = new mysqli("localhost", "acr_school", "Shai2991", "acr_Portfolio");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form data and sanitize inputs
    $id = $_POST["id"];
    $productName = $_POST["productName"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    // You can add more fields to update here

    // Update the product details in the database
    $sql = "UPDATE images_for_sale SET product_name=?, price=?, description=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $productName, $price, $description, $id);
    if ($stmt->execute()) {
        // Redirect to the shop page after successful update
        header("Location: shop.php");
        exit();
    } else {
        echo "Error updating product: " . $conn->error;
    }
}

$conn->close();
?>
