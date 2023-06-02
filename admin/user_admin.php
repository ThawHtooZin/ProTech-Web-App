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
              <h1 class="m-0">Users Data Page</h1>
            </div><!-- /.col -->
            <div class="col-1">
              <a href="user_add.php" class="btn btn-success">Add</a>
            </div>
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <?php
      $stmt = $pdo->prepare("SELECT * FROM users");
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
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">role</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($datas as $data) {
              ?>
              <tr>
                <th><?php echo $data['id']; ?></th>
                <th><?php echo $data['username']; ?></th>
                <th><?php echo $data['email']; ?></th>
                <th><?php echo $data['password']; ?></th>
                <th><?php echo $data['role']; ?></th>
                <th>
                  <a href="user_update.php?id=<?php echo $data['id']; ?>" class="btn btn-warning">Update</a>
                  <a href="user_delete.php?id=<?php echo $data['id']; ?>" class="btn btn-danger">Delete</a>
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
    <!-- /.content-wrapper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
