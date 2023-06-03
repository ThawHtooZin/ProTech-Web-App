<?php
session_start();
include 'config/connect.php';
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <style media="screen">
    .first-container{
      padding-top: 100px;
      background-image: url("image/background2.jpg");
      background-size: cover;
      padding-bottom: 100px;
    }
    .first-container h1{
      background:rgba(0, 0, 0, 0.3);
    }
  </style>
  <body>
    <?php
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM course WHERE id=$id");
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
    <div class="first-container">
      <h1 class="text-light text-center"><?php echo $data['name']; ?></h1>
    </div>
    <div class="main-container container">
      <h1 class="text-center" style="margin-bottom:200px; margin-top:52px;">YAY</h1>
    </div>
    <div class="text-center footer bg-primary pt-5 pb-5">
      <h1>ProTech</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,</p>
      <a href="about.php" class="text-light">About us</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
