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
    if(empty($_POST['name']) || empty($_POST['description'])){
      if(empty($_POST['name'])){
        $nameerror = true;
      }
      if(empty($_POST['description'])){
        $descerror = true;
      }
    }else{
        if(!empty($_FILES['video_url']['name'])){
          $lesson_name = $_POST['name'];
          $video_url = $_FILES['video_url']['name'];
          $description = $_POST['description'];
          $id = $_GET['id'];
          $stmt = $pdo->prepare("UPDATE lessons SET lesson_name='$lesson_name', lesson_video_url='$video_url', description='$description' WHERE id=$id");
          $data = $stmt->execute();
          if($data){
            echo "<script>alert('Lesson Updated successfully!'); window.location.href='lesson_admin.php';</script>";
          }else{
            echo "<script>alert('Sorry, there was an error!'); window.location.href='lesson_admin.php';</script>";
          }
        }else{
          $lesson_name = $_POST['name'];
          $description = $_POST['description'];
          $id = $_GET['id'];
          $stmt = $pdo->prepare("UPDATE lessons SET lesson_name='$lesson_name', description='$description' WHERE id=$id");
          $data = $stmt->execute();
          if($data){
            echo "<script>alert('Lesson Updated successfully!'); window.location.href='lesson_admin.php';</script>";
          }else{
            echo "<script>alert('Sorry, there was an error!'); window.location.href='lesson_admin.php';</script>";
          }
        }

    }
  }
  $id = $_GET['id'];
  $stmt = $pdo->prepare("SELECT * FROM lessons WHERE id=$id");
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
        <form action="" method="post">
          <input type="hidden" name="_token" value="<?php echo $_SESSION['_token']; ?>">
          <div class="card-body">
            <div class="form-group">
              <label for="">Lesson Name</label>
              <input type="text" class="form-control <?php if($nameerror === true){echo 'is-invalid';} ?>" placeholder="Enter Name" name="name" value="<?php echo $data['lesson_name']; ?>">
            </div>
            <div class="form-group">
              <label for="">Video Url</label>
              <input type="file" name="video_url" id="" class="form-control <?php if($urlerror === true){echo 'is-invalid';} ?>">
              <div class="w-50">
                <video width="320" height="240" controls>
                  <source src="Videos/Laravel/<?php echo $data['lesson_video_url']; ?>" type="video/mp4">
                </video>
              </div>
            </div>
            <div class="form-group">
              <label for="">Description</label>
              <input type="text" onchange="upload_check()" class="form-control <?php if($descerror === true){echo 'is-invalid';} ?>" placeholder="Enter Description" name="description" value="<?php echo $data['description']; ?>">
            </div>
            <div class="form-group">
              <label for="">Course</label>
              <select class="form-control" name="course">
                <?php
                $stmt = $pdo->prepare("SELECT * FROM course");
                $stmt->execute();
                $courses = $stmt->fetchall();
                foreach ($courses as $course) {
                ?>
                <option value="<?php echo $course['id']; ?>" <?php if($data['course_id'] == $course['id']){echo "selected";} ?>><?php echo $course['name']; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-warning" >Update</button>
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
<script type="text/javascript">
function upload_check()
{
var upl = document.getElementById("file_id");
var max = document.getElementById("max_id").value;

if(upl.files[0].size > max)
{
   alert("File too big!");
   upl.value = "";
}
};
</script>
</body>
</html>

upload_max_filesize=6000M
post_max_size=5000M
max_execution_time=6000
max_input_time=6000
