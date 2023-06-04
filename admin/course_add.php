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
  <title>ProTech Dashboard</title>

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
    if(empty($_POST['name']) || empty($_FILES['image']['name']) || empty($_POST['description']) || empty($_POST['price'])){
      if(empty($_POST['name'])){
        $nameerror = true;
      }
      if(empty($_FILES['image']['name'])){
        $imgerror = true;
      }
      if(empty($_POST['description'])){
        $descerror = true;
      }
      if(empty($_POST['price'])){
        $priceerror = true;
      }

    }else{
        $file = 'images/course_images/'.($_FILES['image']['name']);
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $file);
        $name = $_POST['name'];
        $description= $_POST['description'];
        $price = $_POST['price'];

        $stmt = $pdo->prepare("INSERT INTO course(name, image, description, price) VALUES('$name', '$image', '$description', '$price')");
        $data = $stmt->execute();
        if($data){
          echo "<script>alert('Course created successfully!'); window.location.href='index.php';</script>";
        }else{
          echo "<script>alert('Sorry, there was an error!'); window.location.href='index.php';</script>";
        }
    }
  }
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
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Course Addition Page</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
          <form action="course_add.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="<?php echo $_SESSION['_token']; ?>">
            <div class="card-body">
              <div class="form-group">
                <label for="">Course Name</label>
                <input type="text" class="form-control <?php if($nameerror === true){echo 'is-invalid';} ?>" placeholder="Enter Name" name="name">
              </div>
              <div class="form-group">
                <label for="">Image</label>
                <input type="file" class="form-control <?php if($imgerror === true){echo 'is-invalid';} ?>" placeholder="Enter Image" name="image">
              </div>
              <div class="form-group">
                <label for="">Description</label>
                <input type="text" class="form-control <?php if($descerror === true){echo 'is-invalid';} ?>" placeholder="Enter Description" name="description">
              </div>
              <div class="form-group">
                <label for="">Price</label>
                <input type="number" class="form-control <?php if($priceerror === true){echo 'is-invalid';} ?>" placeholder="Enter Price" name="price">
              </div>
              <div class="form-group">
                <label for="">Category</label>
                <select class="form-control" name="category">
                  <?php
                  $stmt = $pdo->prepare("SELECT * FROM course_category");
                  $stmt->execute();
                  $datas = $stmt->fetchall();
                  foreach ($datas as $data) {
                  ?>
                  <option value="<?php echo $data['id']; ?>"><?php echo $data['category_name']; ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Add</button>
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
