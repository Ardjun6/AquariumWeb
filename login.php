<?php
// A hard-coded example username and password for demonstration.
$correct_username = "Ardjun";
$correct_password = "ardjun";

// Check if form was submitted.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username = $_POST["username"];
    $input_password = $_POST["password"];

    if ($input_username == $correct_username && $input_password == $correct_password) {
        header("Location: admin.php");
        exit();
    } else {
        $error_message = "Incorrect username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            background-color: #f4f4f4; /* Light grey background */
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: #ffffff; /* White background */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); /* Subtle shadow effect */
            width: 350px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #333333; /* Dark grey font color */
            letter-spacing: 1px;
            width: 100%;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #cccccc; /* Light grey border */
            border-radius: 5px;
            background-color: #f8f8f8; /* Light grey input background */
            color: #333333;
            font-size: 16px;
            outline: none;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #0077cc; /* Blue border on focus */
        }

        input[type="submit"] {
            background-color: #0077cc; /* Blue submit button */
            color: #ffffff; /* White text */
            padding: 14px 24px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s, transform 0.2s;
            width: 100%;
        }

        input[type="submit"]:hover, input[type="submit"]:focus {
            background-color: #005cbf; /* Darker blue on hover */
            transform: scale(1.05);
        }

        p {
            margin-top: 20px;
            text-align: center;
            font-weight: bold;
            color: #333333; /* Dark grey font color */
            letter-spacing: 1px;
            width: 100%;
        }
    </style>
</head>
<body>
    <form action="login.php" method="post">
        <?php
        if (isset($error_message)) {
            echo "<p style='color:red; text-align: center; width: 100%; margin-bottom: 20px;'>$error_message</p>";
        }
        ?>
        
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Login">
    </form>
</body>
</html>

