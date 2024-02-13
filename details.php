<?php
$servername = "localhost";
$username = "acr_school";
$password = "Shai2991";
$dbname = "acr_Portfolio";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$image_name = $_GET['shop1'];
$sql = "SELECT * FROM images_for_sale WHERE image_name = '$image_name'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// Check if the user clicked the "Pay Now" button
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["processPayment"])) {
    // Get payment data from the form
    $cardNumber = $_POST['cardNumber'];
    $expiryDate = $_POST['expiryDate'];
    $cvv = $_POST['cvv'];

    // Insert payment data into the database
    $payment_sql = "INSERT INTO payments (card_number, expiry_date, cvv) VALUES ('$cardNumber', '$expiryDate', '$cvv')";

    if ($conn->query($payment_sql) === TRUE) {
        echo "Payment information saved successfully!";
    } else {
        echo "Error: " . $payment_sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Enthusiasts</title>
    <link rel="icon" type="image/x-icon" href="./images/logo1.png">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/photo-enthusiasts.css">
       <style>
        /* Dark Modern Style */
        body {
            background-color: #FFFFFF;
            color: #647C90;
            font-family: Arial, sans-serif;
        }

        label{
            color: black;
        }
        
        .premium-container {
            background: #C5C5C5;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.1);
        }

        .premium-title {
            font-family: 'Georgia', serif;
            font-size: 32px;
            color: #3498DB;
            margin-bottom: 20px;
            position: relative;
        }

        .premium-title::after {
            content: "";
            display: block;
            width: 60px;
            height: 4px;
            background: #3498DB;
            position: absolute;
            bottom: -10px;
            left: 0;
        }

        .premium-image {
            max-width: 100%;
            display: block;
            margin: 30px auto;
            border-radius: 10px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.4);
        }

        .premium-header {
            font-size: 28px;
            color: #ffffff;
            margin: 15px 0;
        }

        .premium-price {
            font-size: 24px;
            font-weight: 600;
            color: #ffffff;
            margin-top: 15px;
        }

        .premium-desc {
            font-size: 18px;
            line-height: 1.6;
            color: #1F4591;
            margin-top: 20px;
        }

        .premium-btn {
            padding: 12px 30px;
            font-size: 18px;
            font-weight: 600;
            margin-top: 30px;
            background-color: #3498DB;
            border: none;
            border-radius: 5px;
            color: #ffffff;
            letter-spacing: 0.5px;
            transition: background-color 0.3s ease;
        }

        .premium-btn:hover,
        .premium-btn:focus {
            background-color: #2980B9;
            text-decoration: none;
        }

    </style>
    <style>
        .content {
            position: relative;
        }

        .content h2 {
            position: absolute;
            transform: translate(100%, -67%);
            font-size: 350%;
        }

        .content h2:nth-child(1) {
            color: transparent;
            -webkit-text-stroke: 3px #333;
            filter: blur(3px);
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
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Features.php">Features</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="shop.php">Shop</a>
                    </li>
                </ul>

                <!-- Login button on the right -->
                <a href="login.php" class="btn btn-outline-primary ml-auto">Login</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5 premium-container">
    <br>
         <div class="content">
    <h2>Image Details</h2>
    <h2>Image Details</h2>
    <h2>Image Details</h2>
  </div>
        <hr>

        <img src="./images/<?php echo $row['image_name']; ?>" alt="<?php echo $row['image_name']; ?>"
            class="img-fluid mb-4 premium-image">
        <h3 class="premium-header">
            <?php echo pathinfo($row["image_name"], PATHINFO_FILENAME); ?>
        </h3>
        <p class="card-text premium-price">€
            <?php echo $row["price"]; ?>
        </p>
        <p class="premium-desc">
            <?php echo $row["description"]; ?>
        </p>

        <!-- Checkout button -->
        <button type="button" class="btn btn-success premium-btn" data-toggle="modal" data-target="#paymentModal">
            Checkout
        </button>

        <!-- Download button (visible only if payment was successful) -->
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["processPayment"])): ?>
            <a href="download.php?image=<?php echo $row['image_name']; ?>" class="btn btn-primary mt-3">
                Download Image
            </a>
        <?php endif; ?>
    </div>

    <br>    <br>    <br>

   <!-- Payment Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel" style="color: black;">Payment Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Payment form (for example, credit card details) -->
                <form method="POST">
                <h1 style="color: black;">Payment</h1>
                    <div class="form-group">
                        <label for="fullName">Full Name</label>
                        <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Enter your full name" required>
                    </div>
                    <div class="form-group">
                        <label for="cardNumber">Card Number</label>
                        <input type="text" class="form-control" id="cardNumber" name="cardNumber" placeholder="Enter card number" required>
                    </div>
                    <div class="form-group">
                        <label for="expiryDate">Expiry Date</label>
                        <input type="text" class="form-control" id="expiryDate" name="expiryDate" placeholder="MM/YY" required>
                    </div>
                    <div class="form-group">
                        <label for="agenda">Agenda (Calendar)</label>
                        <input type="date" class="form-control" id="agenda" name="agenda" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="cvv">CVV</label>
                            <input type="text" class="form-control" id="cvv" name="cvv" placeholder="CVV" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="processPayment">Pay Now</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


    <!-- Footer -->
    <footer class="footer py-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-4">
                    <h5>About Us</h5>
                    <p>Join our vibrant community of photographers, learn, and be inspired. Dive into a world of stunning
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
