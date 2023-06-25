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
        <form action="blog.php" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search For A Blog" name="search">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
          </div>
        </form>
        <div class="row">
            <a href="blog.php?category=general" class="col cat-box" style="background-image: url('Image/general.jpg'); background-size:contain; background-position:center; background-repeat:no-repeat;">
              <h5 class="text-dark">GENERAL</h5>
            </a>
            <a href="blog.php?category=career" class="col cat-box" style="background-image: url('Image/carrer.jpg'); background-size:contain; background-position:center; background-repeat:no-repeat;">
              <h5 class="text-light">CAREER</h5>
            </a>
            <a href="blog.php?category=database" class="col cat-box" style="background-image: url('Image/database.jpg'); background-size:contain; background-position:center; background-repeat:no-repeat;">
              <h5 class="text-success">DATABASE</h5>
            </a>
            <a href="blog.php?category=server" class="col cat-box" style="background-image: url('Image/server.jpg'); background-size:contain; background-position:center; background-repeat:no-repeat;">
              <h5 class="text-warning">SERVER</h5>
            </a>
            <a href="blog.php?category=designpattern" class="col cat-box" style="background-image: url('Image/design.jpg'); background-size:contain; background-position:center; background-repeat:no-repeat;">
              <h5 class="text-danger">DESIGN PATTERN</h5>
            </a>
            <a href="blog.php?category=softskill" class="col cat-box" style="background-image: url('image/softskill.jpg'); background-size:contain; background-position:center; background-repeat:no-repeat;">
              <h5>SOFT SKILL</h5>
            </a>
        </div>
        <br>
        <div class="row ms-auto me-auto">
          <?php
          if(!empty($_GET['pageno'])){
            $pageno = $_GET['pageno'];
          }else{
            $pageno = 1;
          }
          $numOfrecs = 15;
          $offset = ($pageno -1) * $numOfrecs;
          if(empty($_GET['category'])){
            if(empty($_POST['search']) && empty($_COOKIE['search'])){
              $stmt = $pdo->prepare("SELECT * FROM blog ORDER BY id DESC");
              $stmt->execute();
              $rawResult = $stmt->fetchall();
              $total_pages = ceil(count($rawResult) / $numOfrecs);

              $stmt = $pdo->prepare("SELECT * FROM blog ORDER BY id DESC LIMIT $offset,$numOfrecs");
              $stmt->execute();
              $result = $stmt->fetchall();
            }else{
              if(!empty($_POST['search'])){
                $searchkey = $_POST['search'];
              }else{
                $searchkey = $_COOKIE['search'];
              }

              $stmt = $pdo->prepare("SELECT * FROM blog WHERE description LIKE '%$searchkey%' ORDER BY id DESC");
              $stmt->execute();
              $rawResult = $stmt->fetchall();
              $total_pages = ceil(count($rawResult) / $numOfrecs);

              $stmt = $pdo->prepare("SELECT * FROM blog WHERE description LIKE '%$searchkey%' ORDER BY id DESC LIMIT $offset,$numOfrecs");
              $stmt->execute();
              $result = $stmt->fetchAll();
            }
          }else{
            $category = $_GET['category'];

            if(empty($_POST['search']) && empty($_COOKIE['search'])){
              $stmt = $pdo->prepare("SELECT * FROM blog WHERE category='$category' ORDER BY id DESC ");
              $stmt->execute();
              $rawResult = $stmt->fetchall();
              $total_pages = ceil(count($rawResult) / $numOfrecs);

              $stmt = $pdo->prepare("SELECT * FROM blog WHERE category='$category' ORDER BY id DESC LIMIT $offset,$numOfrecs ");
              $stmt->execute();
              $result = $stmt->fetchall();
            }else{
              if(!empty($_POST['search'])){
                $searchkey = $_POST['search'];
              }else{
                $searchkey = $_COOKIE['search'];
              }

              $stmt = $pdo->prepare("SELECT * FROM blog WHERE category='$category' AND description LIKE '%$searchkey%'  ORDER BY id DESC");
              $stmt->execute();
              $rawResult = $stmt->fetchall();
              $total_pages = ceil(count($rawResult) / $numOfrecs);

              $stmt = $pdo->prepare("SELECT * FROM blog WHERE category='$category' AND description LIKE '%$searchkey%' ORDER BY id DESC LIMIT $offset,$numOfrecs");
              $stmt->execute();
              $result = $stmt->fetchAll();
            }
          }
          if($result){
            $i = 1;
            foreach ($result as $data) {
          ?>
          <a href="blog_detail.php?title=<?php echo $data['title']; ?>" style="margin-left: 5px; width:32%; text-decoration:none;" class="mb-3">
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
          $i++;
        }
      }
          ?>
        </div>
        <ul class="pagination float-end">
          <li class="page-item"><a class="page-link" href="?pageno=1">First</a></li>
          <li class="page-item <?php if($pageno <= 1){echo 'disabled';} ?>">
            <?php
            if(!empty($_GET['category'])){
              ?>
              <a class="page-link" href="<?php if($pageno <= 1){echo '#';} else {echo "?pageno=".($pageno-1) . "&category=".$_GET['category'];} ?>">Previous</a>
              <?php
            }else{
              ?>
              <a class="page-link" href="<?php if($pageno <= 1){echo '#';} else {echo "?pageno=".($pageno-1);} ?>">Previous</a>
              <?php
            }
             ?>
          </li>
          <li class="page-item"><a class="page-link" href="#"><?php echo $pageno; ?></a></li>
          <li class="page-item <?php if($pageno >= $total_pages){echo 'disabled';}; ?>">
            <?php
            if(!empty($_GET['category'])){
            ?>
            <a class="page-link" href="<?php if($pageno >= $total_pages){echo '#';}else{echo "?pageno=".($pageno+1) . "&category=".$_GET['category'];} ?>">Next</a>
            <?php
            }else{
            ?>
            <a class="page-link" href="<?php if($pageno >= $total_pages){echo '#';}else{echo "?pageno=".($pageno+1);} ?>">Next</a>

            <?php
            }
             ?>
          </li>
          <li class="page-item"><a class="page-link" href="?pageno=<?php echo $total_pages; ?>">Last</a> </li>
        </ul>
      </div>
    </div>
    <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
