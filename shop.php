<?php
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
<style>
    /* Premium Palette */
    :root {
        --premium-white: #C5C5C5;
        --premium-aqua: #647C90;
    }

        body {
        font-family: 'Times New Roman', serif;
        background-color: #FFFFFF;
        color: var(--premium-aqua);
    }

    /* Ensuring Uniform Card Height and Width with Increased Gap */
    .card {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid #979797;
        height: 420px;
        width: 300px;
        margin: 10px auto;
        transition: all 0.3s;
        overflow: hidden;
    }

    .card img {
        height: 220px;
        width: 100%;
        object-fit: cover;
        transition: transform 0.3s;
        /* Smooth transition for hover effect */
    }

    /* Card body adjustments */
    .card-body {
        background-color: var(--premium-white);
    }

    /* Glowing Effect on Hover */
    .card:hover {
        transform: scale(1.05);
        /* Card enlargens slightly */
        box-shadow: 0 0 20px rgb(82, 82, 82);
    }

    .card:hover img {
        transform: scale(1.1);
        /* Image zooms in slightly */
    }
</style>

<style>
        .content {
            position: relative;
        }

        .content h2 {
            position: absolute;
            position: center;
        }

        .content h2:nth-child(1) {
            color: transparent;
            -webkit-text-stroke: 3px #333;
            filter: blur(1px);
        }

        .content h2:nth-child(3) {
            color: #fff6;
            filter: drop-shadow(0 15px 15px #fff);
            z-index: 1;
            text-shadow: -15px 15px 15px rgba(0, 0, 0, 0.2),
            15px -15px 15px rgba(255, 255, 255, 0.2);
        }

        .content h2:nth-child(2) {
            color: #03a9f4;
            z-index: 2;
            animation: animate 4s ease-in-out infinite;
        }

        @keyframes animate {
            0%,
            100% {
                clip-path: polygon(
                    0% 45%,
                    7% 42%,
                    13% 40%,
                    20% 41%,
                    26% 42%,
                    32% 46%,
                    37% 51%,
                    44% 53%,
                    51% 55%,
                    55% 60%,
                    64% 60%,
                    71% 62%,
                    80% 62%,
                    84% 59%,
                    90% 57%,
                    94% 55%,
                    98% 54%,
                    100% 51%,
                    100% 100%,
                    0% 100%
                );
            }
            50% {
                clip-path: polygon(
                    0% 63%,
                    4% 61%,
                    9% 63%,
                    14% 66%,
                    20% 67%,
                    29% 67%,
                    36% 67%,
                    45% 64%,
                    52% 60%,
                    60% 57%,
                    67% 54%,
                    74% 53%,
                    79% 49%,
                    85% 47%,
                    89% 47%,
                    94% 44%,
                    96% 41%,
                    100% 37%,
                    100% 100%,
                    0% 100%
                );
            }
        }
    </style>

        <style>
            .content {
                display: flex;
                align-items: center;
                justify-content: center;
                text-align: center;
                height: 4vh; /* Adjust height as needed */
            }

            .content h2 {
                margin: 10px 0; /* Adjust spacing between headings */
                font-size: 3rem; /* Default font size */
            }

            /* Media query for smaller screens */
            @media screen and (max-width: 768px) {
                .content h2 {
                    font-size: 2rem; /* Adjust font size for smaller screens */
                }
            }

            /* Media query for even smaller screens */
            @media screen and (max-width: 576px) {
                .content h2 {
                    font-size: 1.5rem; /* Further adjust font size for smaller screens */
                }
            }
        </style>


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
        <div class="content">
        <br>
        <h2>Images Shop</h2>
        <h2>Images Shop</h2>
        <h2>Images Shop</h2>
    </div>
    <hr>

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
                        <a href="details.php?shop1=' . $row["image_name"] . '" class="btn btn-primary">View Details</a>
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
</div>

    <!-- Footer -->
    <footer class="footer py-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-4">
                    <h5>About Us</h5>
                    <p>Join our vibrant community of photographers. learn and be inspired. Dive into a world of stunning
                        images
                        and be part of the journey.</p>
                </div>
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="gallery.php">Gallery</a></li>
                        <li><a href="services.php">Services</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contact</h5><br>
                    Ardjundebitewarie@gmail.com<br>
                    <address>
                        Den Haag, Moerwijk<br>
                        <p title="Phone">P: +31 (06) 14542308</p>
                    </address>
                </div>
            </div>
            <hr>
            <div class="row align-items-center">
                <div class="col-md-6">
                    <ul class="list-inline text-center text-md-left">
                        <li class="list-inline-item"><a href="#">Terms of Service</a></li>
                        <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <a href="https://github.com/Ardjun6?tab=repositories" class="social-icon"><i
                            class="fab fa-github"></i></a>
                    <a href="https://instagram.com/ardjundebi?igshid=MjEwN2IyYWYwYw==" class="social-icon"><i
                            class="fab fa-instagram"></i></a>
                    <a href="#No_Twitter" class="social-icon"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 text-center">
                    <p>&copy; 2023 Ardjun Debi - Tewarie. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>




    <!-- Scripts -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./javascript/photo-enthusiasts.js"></script>

</body>

</html>