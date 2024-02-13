<?php
session_start();
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Features - Admin's Shop</title>
    <link rel="icon" type="image/x-icon" href="./images/logo1.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/photo-enthusiasts.css" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        h2,
        h3 {
            color: #333;
            font-weight: 600;
        }

        .container img {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .container img:hover {
            transform: scale(1.03);
        }

        .navbar-nav a {
            transition: all 0.2s ease;
        }

        .navbar-nav a:hover {
            color: #007bff;
        }

        .feature-card {
            background-color: #f8f9fa;
            border-radius: 10px;
            overflow: hidden;
            /* This will make sure the image follows the border-radius of the card */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            /* Adds a little animation on hover */
        }

        .feature-card:hover {
            transform: translateY(-5px);
            /* Lifts the card a bit on hover for a dynamic effect */
        }

        .feature-text {
            padding: 20px;
        }

        .feature-image {
            max-width: 100%;
            /* This ensures the image takes the full width of its container but no more */
            border-radius: 0 0 10px 10px;
            /* Curves the bottom corners of the image */
            transition: opacity 0.3s;
            /* Adds a little animation on hover */
        }

        .feature-image:hover {
            opacity: 0.9;
            /* Slightly reduces the image's opacity on hover */
        }
    </style>
</head>

<body>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        h2 {
            color: #333;
        }
    </style>

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
                    <li class="nav-item active">
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

    <div class="container mt-5">
        <h2 class="text-center">Exclusive Features of Admin's Shop</h2>
        <hr>

        <!-- Feature 1 -->
        <div class="row mt-5 feature-card">
            <div class="col-12 col-md-6 order-2 order-md-1 d-flex align-items-center">
                <div class="feature-text">
                    <h3><i class="fas fa-box-open mr-2"></i> Curated Collection</h3>
                    <p>Only the finest items, handpicked by our experienced team.</p>
                </div>
            </div>
            <div class="col-12 col-md-6 order-1 order-md-2 mb-3 mb-md-0">
                <img src="https://images.unsplash.com/photo-1523461811963-7f1023caeddd?auto=format&fit=crop&q=80&w=2896&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    alt="Curated Collection" class="img-fluid feature-image">
            </div>
        </div>

        <!-- Feature 2 -->
        <div class="row mt-5 feature-card">
            <div class="col-12 col-md-6 order-2 order-md-1 d-flex align-items-center">
                <div class="feature-text">
                    <h3><i class="fas fa-lock mr-2"></i> Secure Transactions</h3>
                    <p>All transactions are encrypted ensuring your data and money are safe.</p>
                </div>
            </div>
            <div class="col-12 col-md-6 order-1 order-md-2 mb-3 mb-md-0">
                <img src="https://images.unsplash.com/photo-1603899122634-f086ca5f5ddd?auto=format&fit=crop&q=80&w=4032&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    alt="Secure Transactions" class="img-fluid feature-image">
            </div>
        </div>

        <!-- Feature 3 -->
        <div class="row mt-5 feature-card">
            <div class="col-12 col-md-6 order-2 order-md-1 d-flex align-items-center">
                <div class="feature-text">
                    <h3><i class="fas fa-shipping-fast mr-2"></i> Fast Delivery</h3>
                    <p>We guarantee prompt delivery for all your purchases.</p>
                </div>
            </div>
            <div class="col-12 col-md-6 order-1 order-md-2 mb-3 mb-md-0">
                <img src="./images/fast delivery.webp" alt="Fast Delivery" class="img-fluid feature-image">
            </div>
        </div>

        <!-- Additional features can be added similarly -->

    </div>

    <br><br>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./javascript/shop.js"></script>

</body>

</html>