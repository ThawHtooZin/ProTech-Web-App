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
    if(empty($_POST['title']) || empty($_POST['description']) || empty($_POST['main_content'])){
      if(empty($_POST['title'])){
        $titleerror = true;
      }
      if(empty($_POST['description'])){
        $descerror = true;
      }
      if(empty($_POST['main_content'])){
        $mcerror = true;
      }
    }else{
        $file = 'images/blog_images/'.($_FILES['image']['name']);
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $file);
        $title = $_POST['title'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        $main_content = $_POST['main_content'];
        $stmt = $pdo->prepare("INSERT INTO blog(title, description, image, category, main_content) VALUES('$title','$description','$image','$category','$main_content')");
        $data = $stmt->execute();
        if($data){
          echo "<script>alert('Blog created successfully!'); window.location.href='blog_admin.php';</script>";
        }else{
          echo "<script>alert('Sorry, there was an error!'); window.location.href='blog_admin.php';</script>";
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
          <h3 class="card-title">Blog Addition Page</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
          <form action="blog_add.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="<?php echo $_SESSION['_token']; ?>">
            <div class="card-body">
              <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control <?php if($titleerror === true){echo 'is-invalid';} ?>" placeholder="Enter Title" name="title">
                <label for="">Description</label>
                <input type="text" class="form-control <?php if($descerror === true){echo 'is-invalid';} ?>" placeholder="Enter Description" name="description">
                <label for="">Image</label>
                <input type="file" class="form-control" placeholder="Select Image" name="image">
                <label for="">Category</label>
                <select class="form-control" name="category">
                  <option value="general">General</option>
                  <option value="career">Career</option>
                  <option value="database">Database</option>
                  <option value="sever">Sever</option>
                  <option value="designpattern">Design Pattern</option>
                </select>
                <label for="">Main Content</label>
                <textarea  class="form-control <?php if($descerror === true){echo 'is-invalid';} ?>" name="main_content" rows="5" cols="80" placeholder="Enter Your Main Content"></textarea>
              </div>
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
