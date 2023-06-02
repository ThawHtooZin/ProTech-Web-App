<?php
session_start();
 include 'config/connect.php'; ?>
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
          <h3>Login into your Account</h3>
        </div>
        <?php
        if($_POST){
          if(empty($_POST['email']) || empty($_POST['password'])){
            if(empty($_POST['email'])){
              $emailerror = "The Email field is required";
            }
            if(empty($_POST['password'])){
              $passerror = "The Password field is required";
            }
          }else{
            $email = $_POST['email'];
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email='$email'");
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if($data['password'] == $_POST['password']){
              $_SESSION['username'] = $data['username'];
              $_SESSION['logged_in'] = true;
              if($data['role'] == "admin"){
                echo "<script>alert('Login Successful!');window.location.href='admin/index.php'</script>";
              }else{
                echo "<script>alert('Login Successful!');window.location.href='index.php'</script>";
              }
            }
          }
        }
         ?>
        <div class="card-body">
          <form action="login.php" method="post">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
            <p class="text-danger"><?php if(!empty($emailerror)){echo $emailerror;} ?></p>
            <label>Password</label>
            <input type="password" name="password" class="form-control">
            <p class="text-danger"><?php if(!empty($passerror)){echo $passerror;} ?></p>
        </div>
        <div class="card-footer">
          <div class="row">
            <button type="submit" class="btn btn-success">Login</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
