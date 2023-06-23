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
        <div class="row">
            <a href="" class="col cat-box" style="background-image: url('Image/general.jpg'); background-size:contain; background-position:center; background-repeat:no-repeat;">
              <h5 class="text-dark">GENERAL</h5>
            </a>
            <a href="" class="col cat-box" style="background-image: url('Image/carrer.jpg'); background-size:contain; background-position:center; background-repeat:no-repeat;">
              <h5 class="text-light">CAREER</h5>
            </a>
            <a href="" class="col cat-box" style="background-image: url('Image/database.jpg'); background-size:contain; background-position:center; background-repeat:no-repeat;">
              <h5 class="text-success">DATABASE</h5>
            </a>
            <a href="" class="col cat-box" style="background-image: url('Image/server.jpg'); background-size:contain; background-position:center; background-repeat:no-repeat;">
              <h5 class="text-warning">SERVER</h5>
            </a>
            <a href="" class="col cat-box" style="background-image: url('Image/design.jpg'); background-size:contain; background-position:center; background-repeat:no-repeat;">
              <h5 class="text-danger">DESIGN PATTERN</h5>
            </a>
            <a href="" class="col cat-box" style="background-image: url('image/softskill.jpg'); background-size:contain; background-position:center; background-repeat:no-repeat;">
              <h5>SOFT SKILL</h5>
            </a>
        </div>
        <br>
        <div class="row ms-auto me-auto">
          <?php
          $stmt = $pdo->prepare("SELECT * FROM blog");
          $stmt->execute();
          $datas = $stmt->fetchall();
          foreach ($datas as $data) {
          ?>
          <a href="blog-detail.php?id=<?php echo $data['id']; ?>" style="margin-left: 5px; width:32%; text-decoration:none;" class="mb-3">
            <div class="card">
              <div class="card-header">
                <img src="admin/images/blog_images/<?php echo $data['image']; ?>" alt="" width="100%">
              </div>
              <div class="card-body" style="height:120px;">
                <h5><?php echo $data['description']; ?></h5>
                <h1 class="btn btn-warning text-light"><?php echo $data['category']; ?></h1>
              </div>
            </div>
          </a>
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
