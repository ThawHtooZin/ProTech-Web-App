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
      padding-top: 75px;
      background-image: url("image/background2.jpg");
      background-size: cover;
      padding-bottom: 75px;
    }
    .first-container h1{
      background:rgba(0, 0, 0, 0.3);
    }
  </style>
  <body>
    <?php include 'navbar.php'; ?>
    <?php
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM course WHERE id=$id");
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
    <div class="first-container">
      <h1 class="text-light text-center">Welcome From ProTech</h1>
    </div>
    <div class="main-container container mt-4 mb-4">
      <div class="row">
        <div class="col-5">
          <div class="card text-center w-75 ms-auto me-auto">
            <div class="card-header">
              <h2><?php echo $data['name']; ?></h2>
            </div>
            <div class="card-body">
              <p>Description : <?php echo $data['description']; ?></p>
              <p>Price : <?php echo $data['price']; ?>ks</p>
            </div>
          </div>
        </div>
        <div class="col-7">
          <div class="card">
            <div class="card-header">
              <h4>Buying Proccess Is Here</h4>
            </div>
            <?php
            if(isset($_POST['btn'])){
              if(empty($_FILES['image']['name'])){
                $imgerror = "The Image field is required";
              }else{
                $file = 'admin/images/checks/'.($_FILES['image']['name']);
                $imageType = pathinfo($file, PATHINFO_EXTENSION);

                if($imageType != 'jpg' && $imageType != 'jpeg' && $imageType != 'png'){
                  echo "<script>alert('Image should be jpg, jpeg, png');</script>";
                }else{
                  $image = $_FILES['image']['name'];
                  move_uploaded_file($_FILES['image']['tmp_name'], $file);
                  $username = $_SESSION['username'];
                  $requested_course = $_GET['id'];
                  $stmt = $pdo->prepare("INSERT INTO course_order(username,requested_course,image,permission) VALUES (:username,:requested_course, :image,:permission)");

                  $result = $stmt->execute(
                    array(':username'=>$username, ':requested_course'=>$requested_course, ':image'=>$image, ':permission'=>'notallowed')
                  );

                  if ($result) {
                    echo "<script>alert('Order Submitted! Please wait for few hours atleast a day.'); window.location.href='index.php';</script>";
                  }
                }
              }
            }
            ?>
            <div class="card-body">
              <?php
              $id = $_GET['id'];
              ?>
              <form action="buy_a_course.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
                <label>Please Select the payment check</label>
                <input type="file" name="image" class="form-control">
                <p class="text-warning">* Please wait for few hours, longest one day. the admin will check the uploaded check and give permission.</p>
                <div class="row container">
                  <button type="submit" name="btn" class=" w-25 btn btn-success">Buy</button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
