<?php 

require_once __DIR__."/../app/config/database.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location:register.php");
    exit; 
}

$username = trim($_POST["username"]??"");
$email = trim($_POST["email"]??"");
$country = trim($_POST["country"]??"");
$password = trim($_POST["password"]??"");
$confirm_password = trim($_POST["confirm-password"]??"");

if(
    empty($username) || 
    empty($email) ||
    empty($country) ||
    empty($password)||
    empty($confirm_password)
) {
    die("All fields are required.");
}

if($password !== $confirm_password) {
    die("Passwords do not match.");
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    die("Invalid email address");
}

if (strlen($password) < 8) {
    die("Password must contain atleast 8 characters.");
}

$stmt = $pdo->prepare(
    "SELECT id FROM users
    WHERE name = :name OR email = :email
    LIMIT 1"
);

$stmt->execute([
    ":name" => $username, 
    ":email" => $email
]);

if ($stmt->fetch()) {
    die("Username or email already exists.");
}

$password_hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $pdo->prepare(
    "INSERT INTO users 
    (name, email, password_hash, country)
    VALUES 
    (:name, :email, :password_hash, :country)"
);

$stmt->execute([
    ":name" => $username, 
    ":email" => $email, 
    ":password_hash" => $password_hash, 
    ":country" => $country
]);

header("Location: login.php?registered=1");
exit;
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f4f7f6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .registration-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 24px;
            color: #333333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            color: #666666;
            font-size: 14px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #cccccc;
            border-radius: 4px;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        input:focus {
            outline: none;
            border-color: #4a90e2;
        }

        .submit-btn {
            width: 100%;
            padding: 12px;
            background-color: #4a90e2;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #357abd;
        }

        .login-link {
            text-align: center;
            margin-top: 16px;
            font-size: 14px;
            color: #666666;
        }

        .login-link a {
            color: #4a90e2;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="registration-container">
        <h2>Create Account</h2>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="name" name="name" required placeholder="Enter your name">
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required placeholder="Enter your email">
            </div>

            <div class="form-group">
                <label for="country">Country</label>
                <input
                    type="text"
                    id="country"
                    name="country"
                    list="countries"
                    required
                    placeholder="Country/Region"
                    autocomplete="country"
                >

                <datalist id="countries">
                    <option value="Afghanistan">
                    <option value="Albania">
                    <option value="Algeria">
                    <option value="Andorra">
                    <option value="Angola">
                    <option value="Argentina">
                    <option value="Armenia">
                    <option value="Australia">
                    <option value="Austria">
                    <option value="Azerbaijan">

                    <option value="Bahamas">
                    <option value="Bahrain">
                    <option value="Bangladesh">
                    <option value="Barbados">
                    <option value="Belarus">
                    <option value="Belgium">
                    <option value="Belize">
                    <option value="Bhutan">
                    <option value="Bolivia">
                    <option value="Brazil">
                    <option value="Bulgaria">

                    <option value="Cambodia">
                    <option value="Cameroon">
                    <option value="Canada">
                    <option value="Chile">
                    <option value="China">
                    <option value="Colombia">
                    <option value="Croatia">
                    <option value="Cuba">
                    <option value="Cyprus">
                    <option value="Czech Republic">

                    <option value="Denmark">
                    <option value="Egypt">
                    <option value="Estonia">
                    <option value="Ethiopia">
                    <option value="Finland">
                    <option value="France">
                    <option value="Georgia">
                    <option value="Germany">
                    <option value="Ghana">
                    <option value="Greece">

                    <option value="Hungary">
                    <option value="Iceland">
                    <option value="India">
                    <option value="Indonesia">
                    <option value="Iran">
                    <option value="Iraq">
                    <option value="Ireland">
                    <option value="Israel">
                    <option value="Italy">
                    <option value="Japan">

                    <option value="Jordan">
                    <option value="Kazakhstan">
                    <option value="Kenya">
                    <option value="Kuwait">
                    <option value="Latvia">
                    <option value="Lebanon">
                    <option value="Lithuania">
                    <option value="Luxembourg">
                    <option value="Malaysia">
                    <option value="Maldives">

                    <option value="Mexico">
                    <option value="Mongolia">
                    <option value="Morocco">
                    <option value="Myanmar">
                    <option value="Nepal">
                    <option value="Netherlands">
                    <option value="New Zealand">
                    <option value="Nigeria">
                    <option value="Norway">
                    <option value="Oman">

                    <option value="Pakistan">
                    <option value="Panama">
                    <option value="Peru">
                    <option value="Philippines">
                    <option value="Poland">
                    <option value="Portugal">
                    <option value="Qatar">
                    <option value="Romania">
                    <option value="Russia">
                    <option value="Saudi Arabia">

                    <option value="Singapore">
                    <option value="Slovakia">
                    <option value="Slovenia">
                    <option value="South Africa">
                    <option value="South Korea">
                    <option value="Spain">
                    <option value="Sri Lanka">
                    <option value="Sweden">
                    <option value="Switzerland">
                    <option value="Taiwan">
                    <option value="Thailand">

                    <option value="Turkey">
                    <option value="Ukraine">
                    <option value="United Arab Emirates">
                    <option value="United Kingdom">
                    <option value="United States">
                    <option value="Uruguay">
                    <option value="Uzbekistan">
                    <option value="Venezuela">
                    <option value="Vietnam">
                    <option value="Yemen">
                    <option value="Zambia">
                    <option value="Zimbabwe">
                </datalist>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="Create a password">
            </div>

            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" required placeholder="Confirm password">
            </div>

            <button type="submit" class="submit-btn">Register</button>
        </form>

        <div class="login-link">
            Already have an account? <a href="login.php">Log In</a>
        </div>
    </div>
</body>
</html>

