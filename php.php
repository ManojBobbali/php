<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visa Check Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        .container {
            width: 50%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .message {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
        }

        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Received (GET Method)</h2>

        <?php
        // Check if the form is submitted via GET method
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            // Retrieve form data using GET and handle missing parameters
            $name = isset($_GET['name']) ? $_GET['name'] : 'N/A';
            $email = isset($_GET['email']) ? $_GET['email'] : 'N/A';
            $phone = isset($_GET['phone']) ? $_GET['phone'] : 'N/A';

            // Display the form data securely using htmlspecialchars to avoid XSS
            echo "<p><strong>Name:</strong> " . htmlspecialchars($name) . "</p>";
            echo "<p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>";
            echo "<p><strong>Phone:</strong> " . htmlspecialchars($phone) . "</p>";
        } else {
            echo "<p class='error'>Form not submitted yet.</p>";
        }
        ?>
    </div>
</body>
</html>
