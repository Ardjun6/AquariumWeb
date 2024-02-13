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

    // Retrieve product details based on ID
    $sql = "SELECT * FROM images_for_sale WHERE id = ?";
    if($stmt = $conn->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("i", $productId);

        // Attempt to execute the prepared statement
        if($stmt->execute()){
            // Get result
            $result = $stmt->get_result();

            if($result->num_rows == 1) {
                // Product found, fetch details
                $row = $result->fetch_assoc();
                $productName = $row['product_name'];
                $price = $row['price'];
                $description = $row['description'];
                // Other details to fetch as needed

                // Display the edit form
                ?>
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Edit Product</title>
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                </head>
                <body>
                    <div class="container">
                        <h2>Edit Product</h2>
                        <form action="update_product.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $productId; ?>">
                            <div class="form-group">
                                <label for="productName">Product Name:</label>
                                <input type="text" class="form-control" id="productName" name="productName" value="<?php echo $productName; ?>">
                            </div>
                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="text" class="form-control" id="price" name="price" value="<?php echo $price; ?>">
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" id="description" name="description" rows="3"><?php echo $description; ?></textarea>
                            </div>
                            
                            <!-- Add more fields as needed -->
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                </body>
                </html>
                <?php
            } else {
                echo "Product not found.";
            }
        } else{
            echo "Error fetching product details.";
        }
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
