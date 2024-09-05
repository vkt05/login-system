<?php
require "./partials/connection.php";
session_start();
$_SESSION['login'] = false;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container" id="nav">
    <?php
    require "./partials/navbar.php";
    ?>
  </div>

  <div class="container my-5">
    <?php
    if (!$connect) {
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Sorry!</strong> We regret we are facing some technical issues, we fix if ASAP!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
      exit;
    } else {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $email = $_POST['email'];
        $pass = $_POST['password'];

        if ($email != "" && $pass != "") {

          $sql = "select * from data where Email='$email'";
          $result = mysqli_query($connect, $sql);
          
          while ($db_data=mysqli_fetch_assoc($result)) {

            if (password_verify($pass,$db_data['Password'])) {

              $rows = mysqli_num_rows($result);
              $value = "";
              if ($rows==1) {
                $_SESSION['email'] = $email;
                $_SESSION['login'] = true;
                header("location: /loginSystem/index.php");
              } 
              else {

                  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Sorry!</strong> Invaild Credentials.
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
              }
            }
            else {

              echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Sorry!</strong> Invaild Credentials.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
          }
          
        } else {
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Warning!</strong> Input fields can not be empty, Please fill properly.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
      }
    }
    ?>
  </div>

  <div class="container">
    <form action="/loginSystem/login.php" method="POST">
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" value="<?php echo ($value); ?>">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" value="<?php echo ($value); ?>">
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>