<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-light elevation-4 bg-success">
  <!-- Brand Logo -->
  <a href="index.php" class="brand-link" style="text-align:center;">
    <span class="brand-text font-weight-light" style="font-size:30px;">Admin Dashboard</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar bg-light">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-2 d-flex bg-light">
      <div class="info">
        <a href="logout.php" class="d-block"><?php echo $_SESSION['username']; ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <div class="text-center">
          <h5>Home</h5>
        </div>
        <li class="nav-item menu-open">
          <a href="#" class="nav-link active">
            <i class="far fa-circle nav-icon"></i>
            <p>
              Dashboard
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="index.php" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li>
          </ul>
        </li>
        <hr style="color:black; width:100%;">
        <div class="text-center">
          <h5>Logs</h5>
        </div>
        <li class="nav-item">
          <a href="user_admin.php" class="nav-link">
            <i class="bi bi-person-circle"></i>
            <p>
              Users
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link active">
            <i class="far fa-circle nav-icon"></i>
            <p>
              Restaurant
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="restaurant_admin.php" class="nav-link active">
                <i class="bi bi-shop"></i>
                <p>Restaurants</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="restaurant_category_admin.php" class="nav-link active">
                <i class="bi bi-shop-window"></i>
                <p>Restaurant Categories</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="dishes_admin.php" class="nav-link">
            <i class="bi bi-cup-hot-fill"></i>
            <p>
              Dishes
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="orders_admin.php" class="nav-link">
            <i class="bi bi-card-checklist"></i>
            <p>
              Orders
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
