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
    <?php include 'navbar.php';
    $id = $_GET['id'];
    ?>
    <?php
    $stmt = $pdo->prepare("SELECT * FROM course WHERE id=$id");
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!empty($_SESSION['username'])){
    $username = $_SESSION['username'];
    $ownedcourse = $pdo->prepare("SELECT * FROM user_courses WHERE username='$username'");
    $ownedcourse->execute();
    $ocdata = $ownedcourse->fetch(PDO::FETCH_ASSOC);
  }
    ?>
    <div class="first-container">
      <h1 class="text-light text-center"><?php echo $data['name']; ?></h1>
    </div>
    <div class="main-container container">
      <div class="row">
        <a href="<?php
        if(!empty($_SESSION['logged_in'])){
          if($_SESSION['logged_in'] === true){
            if(!empty($ocdata['username'])){
              $id = $_GET['id'];
              $ocsstmt = $pdo->prepare("SELECT * FROM user_courses WHERE username='$username' AND course_id=$id;");
              $ocsstmt->execute();
              $ocsdatas = $ocsstmt->fetch(PDO::FETCH_ASSOC);

              if(empty($ocsdata['username'])){
                echo "course_page.php?id=". $_GET['id'] ."&lesson=1";
              }else{
                echo "buy_a_course.php?id=". $data['id'] ."";
              }
            }else{
              echo "buy_a_course.php?id=". $data['id'] ."";
            }
          }
        }else{
          echo "login.php";
        }

        ?>" class="btn btn-primary w-50 ms-auto me-auto mt-4 mb-4">Start Learning Today</a>
        <p class="text-center">PRICE : <?php echo $data['price']; ?>ks</p>
      </div>
      <h2>Description</h2>
      <hr>
      <p><?php echo $data['description']; ?></p>
      <br><br>
      <h2>Lessons</h2>
      <hr>
      <p>comming soon..</p>
      <br><br>
      <h2>Teaching Method</h2>
      <hr>
      <p>We will be learning with videos that are made for learning for once video a day, one hour per video and at least two hour of project or assignment.</p>
      <br><br>
    </div>
    <div class="text-center footer bg-primary pt-5 pb-5">
      <h1>ProTech</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,</p>
      <a href="about.php" class="text-light">About us</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
