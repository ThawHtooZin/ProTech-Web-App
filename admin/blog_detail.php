<?php include 'config/connect.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <body>

    <?php
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM blog WHERE id='$id'");
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
     ?>
    <?php
    if($_GET['row'] == 'main_content'){
      ?>
      <div class="modal" id="model" style="display:block !important;">
      <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title">Main Content</h5>
      <a href="blog_admin.php" style="text-decoration:none; color:black;">
      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-bs-hidden="true">&times;</span>
      </button>
      </a>
      </div>
      <div class="modal-body">
      <?php echo $data['main_content']; ?>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-danger"><a href="blog_admin.php" style="text-decoration:none; color:white;">Close</a></button>
      </div>
      </div>
      </div>
      </div>
      <?php
    }
     ?>
    <?php
    if($_GET['row'] == 'image'){
      ?>
      <div class="modal" id="model" style="display:block !important;">
      <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title">Image</h5>
      <a href="blog_admin.php" style="text-decoration:none; color:black;">
      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-bs-hidden="true">&times;</span>
      </button>
      </a>
      </div>
      <div class="modal-body">
      <img src="images/blog_images/<?php echo $data['image']; ?>" alt="" width="100%">
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-danger"><a href="blog_admin.php" style="text-decoration:none; color:white;">Close</a></button>
      </div>
      </div>
      </div>
      </div>
      <?php
    }
     ?>
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
