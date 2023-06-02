<?php include 'config/connect.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <div class="container mt-5">
      <div class="card ms-auto me-auto w-50">
        <div class="card-header text-center">
          <h3>Register an account</h3>
        </div>
        <div class="card-body">
          <?php
          if($_POST){
            if(empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])){
              if(empty($_POST['username'])){
                $usererror = "The Username field is required";
              }
              if(empty($_POST['email'])){
                $emailerror = "The Email field is required";
              }
              if(empty($_POST['password'])){
                $passerror = "The Password field is required";
              }
            }else{
              $username = $_POST['username'];
              $email = $_POST['email'];
              $password = $_POST['password'];
              $stmt = $pdo->prepare("INSERT INTO users(username,email,password) VALUES('$username','$email','$password')");
              $data = $stmt->execute();
              if($data){
                echo "<script>alert('Register successful!');windows.location.href='login.php'</script>";
              }
            }
          }
          ?>
          <form action="register.php" method="post">
            <label>Username</label>
            <input type="text" name="username" class="form-control" placeholder="Your Username">
            <p class="text-center"><?php if(!empty($usererror)){echo $usererror;} ?></p>
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Your Email">
            <p class="text-center"><?php if(!empty($emailerror)){echo $emailerror;} ?></p>
            <label>Password</label>
            <input type="text" name="password" class="form-control" placeholder="Your Password">
            <p class="text-center"><?php if(!empty($passerror)){echo $passerror;} ?></p>
        </div>
        <div class="card-footer">
          <div class="row">
            <button type="submit" class="btn btn-success">Register</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
