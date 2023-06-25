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
      background-image: url("image/background2.jpg");
      background-size: cover;
      padding-bottom: 200px;
    }
    .first-container h1{
      background:rgba(0, 0, 0, 0.3);
    }
  </style>
  <body>
    <?php
    if($_POST){
      $search = $_POST['search'];
      $stmt = $pdo->prepare("SELECT * FROM course WHERE name LIKE '%$search%'");
      $stmt->execute();
      $datas = $stmt->fetchall();
    }else{
      $stmt = $pdo->prepare("SELECT * FROM course");
      $stmt->execute();
      $datas = $stmt->fetchall();
    }


     ?>
    <?php include 'navbar.php'; ?>
    <div class="first-container">
      <h1 class="text-light text-center">Course</h1>
    </div>
    <?php
    if(!empty($_GET['pageno'])){
      $pageno = $_GET['pageno'];
    }else{
      $pageno = 1;
    }
    $numOfrecs = 12;
    $offset = ($pageno -1) * $numOfrecs;

    if(empty($_POST['search']) && empty($_COOKIE['search'])){
      $stmt = $pdo->prepare("SELECT * FROM course ORDER BY id DESC");
      $stmt->execute();
      $rawResult = $stmt->fetchall();
      $total_pages = ceil(count($rawResult) / $numOfrecs);

      $stmt = $pdo->prepare("SELECT * FROM course ORDER BY id DESC LIMIT $offset,$numOfrecs");
      $stmt->execute();
      $result = $stmt->fetchall();
    }else{
      if(!empty($_POST['search'])){
        $searchkey = $_POST['search'];
      }else{
        $searchkey = $_COOKIE['search'];
      }

      $stmt = $pdo->prepare("SELECT * FROM course WHERE name LIKE '%$searchkey%' ORDER BY id DESC");
      $stmt->execute();
      $rawResult = $stmt->fetchall();
      $total_pages = ceil(count($rawResult) / $numOfrecs);

      $stmt = $pdo->prepare("SELECT * FROM course WHERE name LIKE '%$searchkey%' ORDER BY id DESC LIMIT $offset,$numOfrecs");
      $stmt->execute();
      $result = $stmt->fetchAll();
    }
     ?>
    <div class="main-container container">
      <div class="container mt-5 mb-5">
        <form action="course.php" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search For More Courses" name="search">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
          </div>
        </form>
        <br>
        <div class="row">
          <?php
          if($result){
            $i = 1;
            foreach ($result as $data) {
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
          $i++;
        }
      }
          ?>
        </div>
        <ul class="pagination float-end">
          <li class="page-item"><a class="page-link" href="?pageno=1">First</a></li>
          <li class="page-item <?php if($pageno <= 1){echo 'disabled';} ?>">
            <a class="page-link" href="<?php if($pageno <= 1){echo '#';} else {echo "?pageno=".($pageno-1);} ?>">Previous</a>
          </li>
          <li class="page-item"><a class="page-link" href="#"><?php echo $pageno; ?></a></li>
          <li class="page-item <?php if($pageno >= $total_pages){echo 'disabled';}; ?>">
            <a class="page-link" href="<?php if($pageno >= $total_pages){echo '#';}else{echo "?pageno=".($pageno+1);} ?>">Next</a>
          </li>
          <li class="page-item"><a class="page-link" href="?pageno=<?php echo $total_pages; ?>">Last</a> </li>
        </ul>
      </div>
    </div>
    <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
