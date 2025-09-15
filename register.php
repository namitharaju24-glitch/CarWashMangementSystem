<?php
session_start();
include('includes/config.php');

$msg = '';
$success = false;

if (isset($_POST['register'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = md5($_POST['password']);

    $check = $dbh->prepare("SELECT id FROM tblusers WHERE email = :email");
    $check->bindParam(':email', $email);
    $check->execute();

    if ($check->rowCount() > 0) {
        $msg = "Email already registered!";
    } else {
        $sql = "INSERT INTO tblusers (fullname, email, mobile, password) 
                VALUES (:fullname, :email, :mobile, :password)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':fullname', $fullname);
        $query->bindParam(':email', $email);
        $query->bindParam(':mobile', $mobile);
        $query->bindParam(':password', $password);

        if ($query->execute()) {
            $success = true;
            $msg = "Successfully registered! <a href='login.php' class='text-white'>Click here to login</a>.";
        } else {
            $msg = "Registration failed. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register | Car Wash Booking</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap & Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(120deg, #007bff, #00c6ff);
            font-family: 'Barlow', sans-serif;
        }

        .register-container {
            max-width: 480px;
            margin: 60px auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }

        .register-container h2 {
            text-align: center;
            margin-bottom: 25px;
            font-weight: 600;
        }

        .form-control {
            border-radius: 8px;
            transition: box-shadow 0.3s;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(0,123,255,0.25);
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
            border-radius: 8px;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }

        .alert {
            border-radius: 8px;
        }

        .text-link {
            color: #007bff;
        }

        .text-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="register-container">
    <h2>User Registration</h2>

    <?php if ($msg): ?>
        <div class="alert <?php echo $success ? 'alert-success' : 'alert-danger'; ?>">
            <?php echo $msg; ?>
        </div>
    <?php endif; ?>

    <?php if (!$success): ?>
    <form method="POST">
        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="fullname" required class="form-control" placeholder="Enter full name">
        </div>
        <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="email" required class="form-control" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label>Mobile Number</label>
            <input type="text" name="mobile" required class="form-control" placeholder="Enter mobile number">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" required class="form-control" placeholder="Choose a password">
        </div>
        <button type="submit" name="register" class="btn btn-custom btn-block">Register</button>
        <p class="text-center mt-3">Already have an account? <a href="login.php" class="text-link">Login here</a></p>
    </form>
    <?php endif; ?>
</div>

</body>
</html>
