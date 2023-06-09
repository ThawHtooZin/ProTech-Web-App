<?php
session_start();
include 'config/config.php';
include 'config/connect.php';
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Restaurant Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body class="hold-transition sidebar-mini">
  <?php
  if($_POST){
    if(!empty($_FILES['image']['name'])){
      if(empty($_POST['name']) || empty($_POST['description']) || empty($_POST['price'])){
        if(empty($_POST['name'])){
          $nameerror = true;
        }
        if(empty($_POST['description'])){
          $descerror = true;
        }
        if(empty($_POST['price'])){
          $priceerror = true;
        }
      }else{
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $file = 'images/course_images/'.($_FILES['image']['name']);
        $imageType = pathinfo($file, PATHINFO_EXTENSION);
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $file);
        $id = $_GET['id'];
        $stmt = $pdo->prepare("UPDATE course SET name='$name', image='$image', description='$description', price='$price', category_id='$category' WHERE id=$id");
        $stmt->execute();
        echo "<script>alert('Data Updated successfully'); window.location.href='course_admin.php';</script>";
      }
    }else{
      if(empty($_POST['name']) || empty($_POST['description']) || empty($_POST['price'])){
        if(empty($_POST['name'])){
          $nameerror = true;
        }
        if(empty($_POST['description'])){
          $descerror = true;
        }
        if(empty($_POST['price'])){
          $priceerror = true;
        }
      }else{
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $id = $_GET['id'];
        $stmt = $pdo->prepare("UPDATE course SET name='$name', description='$description', price='$price', category_id='$category' WHERE id=$id");
        $stmt->execute();
        echo "<script>alert('Data Updated successfully'); window.location.href='course_admin.php';</script>";
      }
    }
  }
  $stmt = $pdo->prepare("SELECT * FROM course");
  $stmt->execute();
  $data = $stmt->fetch(PDO::FETCH_ASSOC);
  ?>
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <?php
  include 'sidebar.php';
  ?>

`  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container">
      <div class="card card-warning">
        <div class="card-header">
          <h3 class="card-title">Course Update Page</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
          <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="<?php echo $_SESSION['_token']; ?>">
            <div class="card-body">
              <div class="form-group">
                <label for="">Course Name</label>
                <input type="text" class="form-control <?php if($nameerror === true){echo 'is-invalid';} ?>" placeholder="Enter Course Name" name="name" value="<?php echo $data['name']; ?>">
              </div>
              <div class="form-group">
                <label for="">Course Image</label>
                <input type="file" class="form-control" name="image" value="">
                <img src="images/course_images/<?php echo $data['image']; ?>" alt="">
              </div>
              <div class="form-group">
                <label for="">Description</label>
                <input type="text" class="form-control <?php if($descerror === true){echo 'is-invalid';} ?>" placeholder="Enter Description" name="description" value="<?php echo $data['description']; ?>">
              </div>
              <div class="form-group">
                <label for="">Price</label>
                <input type="number" class="form-control <?php if($priceerror === true){echo 'is-invalid';} ?>" placeholder="Enter Price" name="price" value="<?php echo $data['price']; ?>">
              </div>
              <div class="form-group">
                <label for="">Category</label>
                <select class="form-control" name="category">
                  <?php
                  $stmt = $pdo->prepare("SELECT * FROM course_category");
                  $stmt->execute();
                  $cdatas = $stmt->fetchall();
                  foreach ($cdatas as $cdata) {
                    ?>
                    <option value="<?php echo $cdata['id']; ?>"><?php echo $cdata['category_name']; ?></option>
                    <?php
                  }
                  ?>
                </select>
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-warning">Update</button>
            </div>
          </form>
      </div>
    </div>
  </div>

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      <a href="logout.php" class="btn btn-default">Logout</a>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
