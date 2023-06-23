<?php
  session_start();
  include 'config/connect.php';
  if(empty($_SESSION['username']) && empty($_SESSION['logged_in'])){
    header("location: ../login.php");
  }
  if($_SESSION['role'] != 'admin'){
    header("location: ../login.php");
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <!-- Font Awesome Icons -->
      <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="dist/css/adminlte.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    <?php include 'sidebar.php'; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-11">
              <h1 class="m-0">Blog Data Page</h1>
            </div><!-- /.col -->
            <div class="col-1">
              <a href="blog_add.php" class="btn btn-success">Add</a>
            </div>
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <?php
      $stmt = $pdo->prepare("SELECT * FROM blog");
      $stmt->execute();
      $datas = $stmt->fetchall();
      ?>
      <!-- Main content -->
      <div class="content mt-5">
        <div class="container">
          <table class="table table-hover table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Main Content</th>
                <th scope="col">Image</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($datas as $data) {
              ?>
              <tr>
                <th><?php echo $data['id']; ?></th>
                <th><?php echo $data['title']; ?></th>
                <th><?php echo $data['description']; ?></th>
                <th>
                  <form action="blog_detail.php?id=<?php echo $data['id']; ?>&row=main_content" method="post">
                    <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#model">
                      View Main Content
                    </button>
                  </form>
                </th>
                <th>
                  <form action="blog_detail.php?id=<?php echo $data['id']; ?>&row=image" method="post">
                    <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#model2">
                      View Image
                    </button>
                  </form>
                </th>
                <th><?php echo $data['category']; ?></th>
                <th>
                  <a href="blog_update.php?id=<?php echo $data['id']; ?>" class="btn btn-warning">Update</a>
                  <a href="blog_delete.php?id=<?php echo $data['id']; ?>" class="btn btn-danger">Delete</a>
                </th>
              </tr>
              <?php
            }
            ?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.content -->
    </div>
    <?php
    if($_POST){
      $id = $_GET['id'];
      $stmt = $pdo->prepare("SELECT * FROM blog WHERE id='$id'");
      $stmt->execute();
      $data2 = $stmt->fetch(PDO::FETCH_ASSOC);
      ?>
      <?php
    }
     ?>
    <!-- /.content-wrapper -->
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
