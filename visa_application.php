<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visa Application Result</title>
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
            margin: 30px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #4CAF50;
        }

        p {
            font-size: 16px;
            margin: 10px 0;
        }

        .error {
            color: red;
            font-weight: bold;
            text-align: center;
        }

        .success {
            color: green;
            font-weight: bold;
            text-align: center;
        }

        .result {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Visa Application Result</h2>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = isset($_POST['name']) ? trim($_POST['name']) : '';
            $email = isset($_POST['email']) ? trim($_POST['email']) : '';
            $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
            $passport = isset($_POST['passportNumber']) ? trim($_POST['passportNumber']) : '';
            $country = isset($_POST['country']) ? trim($_POST['country']) : '';

            $errors = [];

            // Server-side validation
            if (empty($name)) {
                $errors[] = "Name is required.";
            }

            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "A valid email address is required.";
            }

            if (empty($phone) || !preg_match("/^[0-9]{10}$/", $phone)) {
                $errors[] = "Phone number must be 10 digits.";
            }

            if (empty($passport) || strlen($passport) < 8 || strlen($passport) > 10) {
                $errors[] = "Passport number must be 8-10 characters.";
            }

            if (empty($country)) {
                $errors[] = "Please select a country.";
            }

            // Display errors if any
            if (!empty($errors)) {
                echo '<div class="error">';
                foreach ($errors as $error) {
                    echo '<p>' . htmlspecialchars($error) . '</p>';
                }
                echo '</div>';
            } else {
                // No errors, process the form
                echo '<p><strong>Name:</strong> ' . htmlspecialchars($name) . '</p>';
                echo '<p><strong>Email:</strong> ' . htmlspecialchars($email) . '</p>';
                echo '<p><strong>Phone:</strong> ' . htmlspecialchars($phone) . '</p>';
                echo '<p><strong>Passport Number:</strong> ' . htmlspecialchars($passport) . '</p>';
                echo '<p><strong>Country:</strong> ' . htmlspecialchars($country) . '</p>';

                echo '<div class="result">';
                switch ($country) {
                    case 'USA':
                        echo 'Visa required for most applicants.';
                        break;
                    case 'Canada':
                        echo 'Visa required unless you have an eTA.';
                        break;
                    case 'India':
                        echo 'Visa required before travel.';
                        break;
                    case 'UK':
                        echo 'Visa depends on the duration of stay.';
                        break;
                    case 'Australia':
                        echo 'eVisa available for eligible travelers.';
                        break;
                    default:
                        echo 'Invalid country selection.';
                        break;
                }
                echo '</div>';
            }
        } else {
            echo '<p class="error">Form not submitted yet.</p>';
        }
        ?>
        <div class="footer">
            <button onclick="window.location.href='client.html'">Go Back</button>
        </div>
    </div>
</body>
</html>
