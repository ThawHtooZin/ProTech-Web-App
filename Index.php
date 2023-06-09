<?php
session_start();
include 'config/connect.php';
?>
<?php

if(!empty($_POST['search'])){
  if($_POST['search']){
    setcookie('search', $_POST['search'], time() + (87400 * 36), "/");
  }
}
else{
  if(empty($_GET['pageno'])){
    unset($_COOKIE['search']);
    setcookie('search', null, -1, "/");
  }
}

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
      background-image: url("image/background.jpg");
      background-size: cover;
      padding-bottom: 200px;
    }
    .first-container h1{
      background:rgba(0, 0, 0, 0.3);
    }
  </style>
  <body>
    <?php include 'navbar.php'; ?>
    <div class="first-container">
      <h1 class="text-light text-center">Welcome From ProTech</h1>
    </div>
    <div class="main-container container">
      <div class="container mt-5 mb-5">
        <h1 class="text-center">Courses</h1>
        <br>
        <div class="row">
          <?php
          $stmt = $pdo->prepare("SELECT * FROM course LIMIT 3");
          $stmt->execute();
          $datas = $stmt->fetchall();
          foreach ($datas as $data) {
            $id = $data['category_id'];
            $stmt = $pdo->prepare("SELECT * FROM course_category WHERE id=$id");
            $stmt->execute();
            $cat = $stmt->fetch(PDO::FETCH_ASSOC);
          ?>
          <!-- card -->
          <div class="card" style="width:31.5%; padding:0px 0px; margin-left:10px; margin-right:10px;">
            <div class="card-header">
              <img src="admin/images/course_images/<?php echo $data['image']; ?>" alt="" style="margin:-8px -16px; width:108.7%; border-top-left-radius:5px; border-top-right-radius:5px; margin-bottom:-32px;" width="100%"><br><br>
            </div>
            <div class="card-body text-secondary">
              <h3 class="text-dark"><?php echo $data['name']; ?></h3>
              <p>#<?php echo $cat['category_name']; ?></p>
              <p>Description: <?php echo $data['description']; ?></p>
            </div>
            <div class="card-footer">
              <p class="d-inline">Price : <?php echo $data['price']; ?>ks</p>
              <a href="course_detail.php?id=<?php echo $data['id']; ?>" class="btn btn-success float-end">Check More</a>
            </div>
          </div>
          <!-- card -->
          <?php
          }
          ?>
        </div>

        <br><br><br>
        <div class="text-center">
          <a href="course.php" class="btn btn-primary w-50 ">Check All Courses</a>
        </div>
      </div>
    </div>
    <hr>
    <div class="second-container container mt-5 mb-5">
      <h1 class="text-center">What We also do</h1>
      <div class="container">
        <div class="text-center">
          <img src="image/articleimg.jpg" alt="" width="50%">
        </div>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <div class="text-center">
          <a href="blog.php" class="btn btn-primary w-50">Blogs</a>
        </div>
      </div>
    </div>
    <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
