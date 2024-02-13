<?php
session_start();

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

// Handle Contact Form Submission
if (isset($_POST['submit_support'])) {

    // Get data from form
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    // Insert data into database
    $sql = "INSERT INTO support_messages (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message_sent'] = "Your message has been sent successfully!";
        header("Location: Contact.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Handle Community Message Submission
if (isset($_POST['name']) && isset($_POST['message'])) {

    // Get data from form
    $name = $conn->real_escape_string($_POST['name']);
    $message = $conn->real_escape_string($_POST['message']);
    $stars = intval($_POST['stars']); // Convert to integer

    // Insert data into database
    $sql = "INSERT INTO community_messages (name, message, stars) VALUES ('$name', '$message', $stars)";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message_sent'] = "Your message has been sent successfully!";
        header("Location: Community.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>