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
        <?php include 'navbar.php'; ?>
    <?php
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM course WHERE id=$id");
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
    <div class="first-container">
      <h1 class="text-light text-center"><?php echo $data['name']; ?></h1>
    </div>
    <div class="main-container container pt-5 pb-5">
      <div class="row">
        <div class="col-9">
          <?php
          $lessonid = $_GET['lesson'];
          $stmtlesson = $pdo->prepare("SELECT * FROM lessons WHERE id=$lessonid");
          $stmtlesson->execute();
          $lessondatas = $stmtlesson->fetch(PDO::FETCH_ASSOC);
          ?>
          <?php
          if(!empty($lessondatas['lesson_name'])){
            ?>
            <h1><?php echo $lessondatas['lesson_name']; ?></h1>
            <video width="320" height="240" controls>
              <source src="admin/Videos/<?php echo $lessondatas['lesson_video_url']; ?>" type="video/mp4">
            </video>
            <p><?php echo $lessondatas['description']; ?></p>
            <?php
          }else{
            ?>
            <h3>Please Select a lesson to start learning</h3>
            <img src="image/startlearning.jpg" alt="" width="50%">
            <?php
          }
          ?>
        </div>
        <div class="col-3" style="border-left:20px solid gray;">
          <h2>Lessons</h2>
          <br><br>
          <?php
          $id= $_GET['id'];
          $stmt = $pdo->prepare("SELECT * FROM lessons WHERE course_id=$id");
          $stmt->execute();
          $datas = $stmt->fetchall();
          foreach ($datas as $data) {
            ?>
            <a href="course_page.php?id=<?php echo $id; ?>&lesson=<?php echo $data['id']; ?>"><?php echo $data['lesson_name']; ?></a>
            <hr>
            <?php
          }
          ?>
        </div>
      </div>
    </div>
    <div class="text-center footer bg-primary pt-5 pb-5">
      <h1>ProTech</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,</p>
      <a href="about.php" class="text-light">About us</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
s
