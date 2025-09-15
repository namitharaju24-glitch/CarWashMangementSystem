<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Car Wash Booking Portal</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f8f9fa;
    }

    .navbar-brand {
      font-size: 1.8rem;
      font-weight: bold;
      color: #00aaff !important;
    }

    .navbar-dark .navbar-nav .nav-link {
      color: #f1f1f1;
      margin-right: 15px;
      font-weight: 500;
    }

    .carousel img {
      height: 500px;
      object-fit: cover;
    }

    .cta-section {
      background: linear-gradient(45deg, #007bff, #00c6ff);
      color: white;
      padding: 60px 20px;
      text-align: center;
    }

    .cta-section h1 {
      font-size: 3rem;
      font-weight: bold;
    }

    .cta-section p {
      font-size: 1.2rem;
      margin-bottom: 30px;
    }

    .cta-section .btn {
      padding: 12px 25px;
      font-size: 1.1rem;
      margin: 10px;
      border-radius: 30px;
    }

    footer {
      background: #111;
      color: #ccc;
      padding: 15px 0;
    }

    .btn-login {
      background-color: #ffffff;
      color: #007bff;
      border: 2px solid #ffffff;
      transition: 0.3s;
    }

    .btn-login:hover {
      background-color: #007bff;
      color: #fff;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">CarWash</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navMenu">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navMenu">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
      <li class="nav-item"><a href="washing-plans.php" class="nav-link">Plans</a></li>
      <?php if (isset($_SESSION['user_id'])): ?>
        <li class="nav-item"><a href="userdashboard.php" class="nav-link">Dashboard</a></li>
        <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
      <?php else: ?>
        <li class="nav-item"><a href="login.php" class="nav-link">User Login</a></li>
        <li class="nav-item"><a href="admin/index.php" class="nav-link">Admin Login</a></li>
      <?php endif; ?>
    </ul>
  </div>
</nav>

<!-- Carousel -->
<div id="carCarousel" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/carousel-1.jpg" class="d-block w-100" alt="Car Wash 1">
    </div>
    <div class="carousel-item">
      <img src="img/carousel-2.jpg" class="d-block w-100" alt="Car Wash 2">
    </div>
  </div>
</div>

<!-- Call to Action Section -->
<div class="cta-section">
  <h1>Welcome to Car Wash Booking Portal</h1>
  <p>Fast, Reliable, and Hassle-free Car Cleaning at Your Fingertips</p>
  <a href="login.php" class="btn btn-light btn-login">User Login</a>
  <a href="admin/index.php" class="btn btn-light btn-login">Admin Login</a>
  <a href="register.php" class="btn btn-outline-light">Register Now</a>
</div>

<!-- Footer -->
<footer class="text-center">
  &copy; <?php echo date('Y'); ?> Car Wash Booking Portal. All rights reserved.
</footer>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>
