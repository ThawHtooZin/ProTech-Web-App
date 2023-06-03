<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">ProTech</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" style="margin-left:1000px;" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="Index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="course.php">Cources</a>
        </li>
        <?php

        if(!empty($_SESSION['username'])){
          ?>
          <li class="nav-item">
            <a class="nav-link" href="logout.php"><?php echo $_SESSION['username']; ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin/index.php">Dashboard</a>
          </li>
          <?php
        }else{
          ?>
          <li class="nav-item">
            <a class="btn btn-primary" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-success" href="register.php">Register</a>
          </li>
          <?php
        }
         ?>
      </ul>
    </div>
  </div>
</nav>
