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
      background-image: url("image/background.jpg");
      background-size: cover;
      padding-bottom: 200px;
    }
    .first-container h1{
      background:rgba(0, 0, 0, 0.3);
    }
  </style>
  <body>
    <?php include 'navbar.php'; ?>
    <div class="first-container">
      <h1 class="text-light text-center">Welcome From ProTech</h1>
    </div>
    <div class="main-container container">
      <div class="container mt-5 mb-5">
        <h1 class="text-center">Courses</h1>
        <br>
        <div class="row">
          <div class="col">
            <div class="card text-center">
              <div class="card-header">
                <h3>Basic Course</h3>
              </div>
              <div class="card-body">
                <img src="image/datas/basic_course.jpg" alt="" width="100%"><br><br>
                <p>Description: Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <p>Price : 50000ks</p>
              </div>
              <div class="card-footer">
                <a href="course.php" class="btn btn-success">Check More</a>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card text-center">
              <div class="card-header">
                <h3>Basic Course</h3>
              </div>
              <div class="card-body">
                <img src="image/datas/basic_course.jpg" alt="" width="100%"><br><br>
                <p>Description: Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <p>Price : 50000ks</p>
              </div>
              <div class="card-footer">
                <a href="course.php" class="btn btn-success">Check More</a>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card text-center">
              <div class="card-header">
                <h3>Basic Course</h3>
              </div>
              <div class="card-body">
                <img src="image/datas/basic_course.jpg" alt="" width="100%"><br><br>
                <p>Description: Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <p>Price : 50000ks</p>
              </div>
              <div class="card-footer">
                <a href="course.php" class="btn btn-success">Check More</a>
              </div>
            </div>
          </div>
        </div>
        <br><br><br>
        <div class="text-center">
          <a href="course.php" class="btn btn-primary w-50 ">Check All Courses</a>
        </div>
      </div>
    </div>
    <div class="second-container container mt-5 mb-5">
      <h1 class="text-center">What We also do</h1>
      <div class="container">
        <div class="row">
          <div class="col">
            <img src="image/articleimg.jpg" alt="" width="100%">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <div class="text-center">
              <a href="blog.php" class="btn btn-primary w-50">See More</a>
            </div>
          </div>
          <div class="col">
            <img src="image/blogimg.jpg" alt="" width="100%">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <div class="text-center">
              <a href="blog.php" class="btn btn-primary w-50">See More</a>
            </div>
          </div>
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
