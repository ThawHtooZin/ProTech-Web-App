<?php
session_start();
include 'config/connect.php';
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
  </style>
  <body>
    <?php include 'navbar.php'; ?>
    <div class="first-container">
      <h1 class="text-light text-center">Blogs</h1>
    </div>
    <div class="main-container container">
      <div class="container mt-5 mb-5">
        <h1 class="text-center">Blogs</h1>
        <br>
        <div class="row">
          <?php
          $stmt = $pdo->prepare("SELECT * FROM blog");
          $stmt->execute();
          $datas = $stmt->fetchall();
          foreach ($datas as $data) {
          ?>
          <!-- card -->
          <div class="card text-center" style="width:49%;">
            <div class="card-header">
              <h3><?php echo $data['title']; ?></h3>
            </div>
            <div class="card-body">
              <div class="truncate">
                <?php echo $data['main_content']; ?>
              </div>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#model">
                Read the Main Content
              </button>
            </div>
            <div class="card-footer">
              <p>Description : <?php echo $data['description']; ?></p>
            </div>
          </div>
          <!-- card -->
          <div class="modal" id="model">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Main Content</h5>
                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-bs-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <?php echo $data['main_content']; ?>
                </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
    <div class="text-center footer bg-primary pt-5 pb-5">
      <h1>ProTech</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,</p>
      <a href="about.php" class="text-light">About us</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
