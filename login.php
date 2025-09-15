<?php
session_start();
include('includes/config.php'); // Make sure this file sets up $dbh (PDO)

$msg = '';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']); // same hashing as registration

    $sql = "SELECT id, fullname FROM tblusers WHERE email = :email AND password = :password";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email);
    $query->bindParam(':password', $password);
    $query->execute();

    if ($query->rowCount() == 1) {
        $user = $query->fetch(PDO::FETCH_ASSOC);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['fullname'];
        header("Location: dashboard.php"); // redirect to dashboard
        exit();
    } else {
        $msg = "Invalid email or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Car Wash Booking</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap & Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(120deg, #007bff, #00c6ff);
            font-family: 'Barlow', sans-serif;
        }

        .login-container {
            max-width: 480px;
            margin: 60px auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }

        .login-container h2 {
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

<div class="login-container">
    <h2>User Login</h2>

    <?php if ($msg): ?>
        <div class="alert alert-danger">
            <?php echo $msg; ?>
        </div>
    <?php endif; ?>

    <form method="POST">
        <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="email" required class="form-control" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" required class="form-control" placeholder="Enter password">
        </div>
        <button type="submit" name="login" class="btn btn-custom btn-block">Login</button>
        <p class="text-center mt-3">Don't have an account? <a href="register.php" class="text-link">Register here</a></p>
    </form>
</div>

</body>
</html>
