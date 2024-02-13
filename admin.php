<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$conn = new mysqli("localhost", "acr_school", "Shai2991", "acr_Portfolio");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If a category is selected, update the SQL query.
$category = isset($_GET['category']) ? $_GET['category'] : null;

if ($category) {
    $sql = "SELECT * FROM images_for_sale WHERE category = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $category); 
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $sql = "SELECT * FROM images_for_sale";
    $result = $conn->query($sql);
}

// Fetch categories for dropdown
$sql_categories = "SELECT DISTINCT category FROM images_for_sale";
$categories_result = $conn->query($sql_categories);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Photo Enthusiasts</title>
    <link rel="icon" type="image/x-icon" href="./images/logo1.png">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./css/photo-enthusiasts.css" />
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="./images/logo.png" alt="Photo Enthusiasts Logo" height="50">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Features.php">Features</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="shop.php">Shop</a>
                    </li>
                </ul>

                <!-- Login button on the right -->
                <a href="login.php" class="btn btn-outline-primary ml-auto">Login</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <!-- Category Filter Dropdown -->
        <div class="d-flex justify-content-center mb-3">
            <form method="GET" action="shop.php" class="form-inline">
                <label for="category" class="mr-2">Filter by Category:</label>
                <select name="category" id="category" onchange="this.form.submit()" class="form-control">
                    <option value="">All Categories</option>
                    <?php 
                    while($cat = $categories_result->fetch_assoc()) {
                        $selected = ($cat['category'] == $category) ? "selected" : "";
                        echo "<option $selected value=\"{$cat['category']}\">{$cat['category']}</option>";
                    }
                    ?>
                </select>
            </form>
        </div>

<div class="row">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '
        <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-4">
            <div class="card">
                <a href="details.php?shop1=' . $row["image_name"] . '">
                    <img src="./images/' . $row["image_name"] . '" alt="' . $row["image_name"] . '" class="img-fluid">
                </a>
                <div class="card-body">
                    <h5 class="card-title">' . pathinfo($row["image_name"], PATHINFO_FILENAME) . '</h5>
                    <p class="card-text">$' . $row["price"] . '</p>
                    <!-- Edit button redirects to edit_product.php with the specific product ID -->
                    <a href="edit_product.php?id=' . $row["id"] . '" class="btn btn-primary">Edit</a>
                    <button class="btn btn-danger" onclick="deleteProduct(' . $row["id"] . ')">Delete</button>
                </div>
            </div>
        </div>
        ';
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
</div>





    <!-- Footer -->
    <footer class="footer py-5">
        <div class="container">
            <!-- Footer content here -->
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function deleteProduct(productId) {
            if (confirm("Are you sure you want to delete this product?")) {
                window.location.href = "delete_product.php?id=" + productId;
            }
        }
    </script>
</body>
</html>
