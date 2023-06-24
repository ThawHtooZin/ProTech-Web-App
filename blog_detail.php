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
      padding-top: 200px;
      background-image: url("image/background2.jpg");
      background-size: cover;
      padding-bottom: 200px;
    }
    .first-container h1{
      background:rgba(0, 0, 0, 0.3);
    }
    .truncate {
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    .cat-box{
      border-radius: 5px;
      border: 2px solid gray;
      box-shadow: 3px 5px #888888;
      margin: 5px;
      padding: 10px;
      padding-top: 25px;
      padding-bottom: 25px;
      text-align: center;
      text-decoration: none;
      transition: 0.5s;
    }
    .cat-box:hover{
      border-radius: 5px;
      border: 2px solid gray;
      box-shadow: 6px 10px #888888;
      margin: 0px;
      padding: 15px;
      padding-top: 25px;
      padding-bottom: 25px;
      text-align: center;
      text-decoration: none;
    }
  </style>
  <body>
    <?php include 'navbar.php'; ?>
    <div class="first-container">
      <h1 class="text-light text-center">Blogs</h1>
    </div>
    <div class="main-container container">
      <div class="container mt-5 mb-5">
        <?php
        if(empty($_GET['title'])){
          header("location:blog.php");
        }else{
          $title = $_GET['title'];
          $stmt = $pdo->prepare("SELECT * FROM blog WHERE title='$title'");
          $stmt->execute();
          $data = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        ?>
        <h1 class="text-center text-primary"><?php echo $data['title']; ?></h1>
        <p><?php echo $data['main_content']; ?></p>
        <p class="text-success"><?php echo $data['description']; ?></p>
      </div>
    </div>
    <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
