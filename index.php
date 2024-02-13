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
    <link rel="stylesheet" href="./css/aqua.css" />
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
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Features.php">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="shop.php">Shop</a>
                    </li>
                </ul>

                <!-- Login button on the right -->
                <a href="login.php" class="btn btn-outline-primary ml-auto">Login</a>
            </div>
        </div>
    </nav>



    <!-- Hero Section -->
    <section class="hero text-center d-flex justify-content-center align-items-center">
        <div class="overlay">
            <h1>The largest community of photo enthusiasts</h1>
            <a href="login.php" class="btn btn-primary mt-4">Join Today</a>
        </div>
    </section>



<!-- Section 2 -->
<section class="aquarium-specialist py-5">
    <div class="container">
        <h2 class="text-center mb-5">
            Dive into the World of Aquariums
        </h2>
        <div class="row">
            <div class="col-6 mb-4">
                <div class="content-box h-100 d-flex flex-column justify-content-center align-items-center text-center">
                    <h3>Explore Our Aquatic Showpieces</h3>
                    <p>
                        'De Aquarium Specialist' offers a mesmerizing collection of both freshwater and saltwater
                        aquariums. Immerse yourself in the beauty of aquascapes designed to captivate and inspire.
                    </p>
                </div>
            </div>
            <div class="col-6 mb-4">
                <div class="content-box h-100 d-flex flex-column justify-content-center align-items-center text-center">
                    <h3>Enhance Your Aquarium Experience</h3>
                    <p>
                        Discover a range of aquarium essentials, including tanks of various shapes and sizes, decorations
                        such as stones and plants, and necessary equipment like pumps and heaters. We also offer a diverse
                        selection of fish species to enhance your underwater world.
                    </p>
                </div>
            </div>
            <div class="col-6 mb-4">
                <div class="content-box h-100 d-flex flex-column justify-content-center align-items-center text-center">
                    <h3>Tips and Tricks for Aquarium Enthusiasts</h3>
                    <p>
                        Whether you're a seasoned aquarium owner or a beginner, our website provides valuable tips and
                        advice. Explore resources on maintaining and starting your aquarium journey, ensuring a thriving
                        aquatic environment.
                    </p>
                </div>
            </div>
            <div class="col-6 mb-4">
                <div class="content-box h-100 d-flex flex-column justify-content-center align-items-center text-center">
                    <h3>Exciting Aquarium Game</h3>
                    <p>
                        Experience the thrill of an interactive aquarium game on our website. Developed in collaboration
                        with another company, the game adds a playful dimension to your visit. Check out the teaser on the
                        home page to get a sneak peek and dive into the gameplay.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>




    <!-- Section 3: Product Showcase as Cards -->
<section class="product-showcase py-5">
    <div class="container">
        <h2 class="text-center mb-5">Featured Products</h2>
        <div class="row">

            <?php
            $categories = ['nature', 'cars', 'sports']; // Add your category names here

            // Loop through each category
            foreach ($categories as $category) {
                $sql = "SELECT image_name, price, description, photo FROM images_for_sale WHERE category = '$category' LIMIT 3";
                $result = $conn->query($sql);

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
                                    <p class="card-text">' . $row["description"] . '</p>
                                    <p class="card-text">$' . $row["price"] . '</p>
                                    <a href="details.php?shop1=' . $row["image_name"] . '" class="btn btn-primary">View Details</a>
                                </div>
                            </div>
                        </div>
                        ';
                    }
                } else {
                    echo "<p>No products available for category: $category</p>";
                }
            }

            $conn->close();
            ?>
        </div>
    </div>
</section>

<!-- Section: Aqua Game Teaser with Aquatic Vibe -->
<section class="game-teaser py-5 aqua-vibe-section">
    <div class="container">
        <div class="aqua-teaser-section row align-items-center">
            <div class="col-lg-6">
                <h2 class="neon-glow mb-4">Aqua Game Teaser</h2>
                <div class="content-box text-center">
                    <h3>Embark on an Underwater Adventure!</h3>
                    <p>
                        Get ready to dive into the mesmerizing world of Aqua Game. Experience the thrill of building and
                        managing your own virtual aquarium. Coming soon to redefine your gaming experience.
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- Add an image or video for the game -->
                <img src="images/aqua-game-teaser.jpg" alt="Aqua Game Teaser" class="img-fluid rounded" />
            </div>
        </div>
    </div>
</section>

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