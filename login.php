<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <div class="container mt-5">
      <div class="card ms-auto me-auto w-50">
        <div class="card-header text-center">
          <h3>Login into your Account</h3>
        </div>
        <div class="card-body">
          <form action="login.php" method="post">
            <label>Username</label>
            <input type="text" name="" class="form-control">
            <label>Password</label>
            <input type="text" name="" class="form-control">
        </div>
        <div class="card-footer">
          <div class="row">
            <button type="submit" class="btn btn-success">Login</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
