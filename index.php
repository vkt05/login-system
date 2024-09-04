<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome-The finest login system</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div id="cover-all">
    <div class="container" id="nav">
      <?php

      require './partials/navbar.php';
      ?>

    </div>

    <div class="contianer home-content-wrap">
      <?php
      if (isset($_SESSION['email']) && $_SESSION['login'] == true) {

        echo '
        <div class="img-container">
          <div class="img">
          <img src="https://images.pexels.com/photos/417074/pexels-photo-417074.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="natureimg1">
          </div>
          <div class="img">
          <img src="https://images.pexels.com/photos/709552/pexels-photo-709552.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="natureimg2">
          </div>
          <div class="img">
          <img src="https://images.pexels.com/photos/459203/pexels-photo-459203.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="natureimg3">
          </div>
</div>
        ';
      } else {

        echo '
          <div class="login-signup-wrap">
              <h1>Please login to view this page.</h1>
              <button id="login-btn">Login</button>
              
        ';
      }

      ?>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="script.js"></script>
</body>

</html>