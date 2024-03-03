
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Digital Library</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<link rel="stylesheet" href="adminv/plugins/fontawesome-free/css/all.min.css">

<link rel="stylesheet" href="adminv/dist/css/adminlte.min.css?v=3.2.0">
</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">

<nav class="main-header navbar navbar-expand navbar-white navbar-light">

<ul class="navbar-nav">
<li class="nav-item">
<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
</li>

<ul class="navbar-nav ml-auto">

<li class="nav-item dropdown">
<a class="nav-link" data-toggle="dropdown" href="#">

</a>
<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
<a href="#" class="dropdown-item">
</a>
</nav>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<a href="#" class="brand-link">
<img src="adminv/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
<span class="brand-text font-weight-light">DIGITAL LIBRARY</span>
</a>
<div class="sidebar">
<div class="form-inline">
<div class="input-group">
<div class="input-group-append">
</div>
</div>
</div>


<!-- Sidebar -->
    <div class="sidebar">

</div>
      <!-- Ini Menu -->
      <nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->

    <li class="nav-item">
   
        <a href="dashboard.php?page=<?= $_SESSION['data']['Role'];?>" class="nav-link">
          <i class="nav-icon fas fa-home"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>
      <li class="nav-item">
          <a href="dashboard.php?page=databuku" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
            <p>
              Data Buku
            </p>
          </a>
        </li>
        <?php 
          if($_SESSION['data']['Role'] == 'admin' || $_SESSION['data']['Role'] == 'petugas'){ ?>
              <li class="nav-item">
          <a href="dashboard.php?page=Kategoribuku" class="nav-link">
              <i class="nav-icon fa fa-list"></i>
            <p>
              Kategori Buku
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="dashboard.php?page=Peminjam" class="nav-link">
            <i class="nav-icon fa fa-users"></i>
            <p>
              Peminjaman
            </p>
          </a>
        </li>
        <?php   }
        ?>
        <?php 
          if($_SESSION['data']['Role'] == 'user'){ ?>
              <li class="nav-item">
          <a href="dashboard.php?page=koleksi" class="nav-link">
            <i class="nav-icon fa fa-tag"></i>
            <p>
              Histori Peminjaman
            </p>
          </a>
        </li>
       <?php   }
        ?>
        <?php 
          if($_SESSION['data']['Role'] == 'admin'){ ?>
              <li class="nav-item">
          <a href="dashboard.php?page=petugas" class="nav-link">
            <i class="nav-icon fa fa-users"></i>
            <p>
              Petugas
            </p>
          </a>
        </li>
       <?php   }
        ?>
                         <li class="nav-item">
          <a href="dashboard.php?page=ulasanbuku" class="nav-link">
              <i class="nav-icon fa fa-share"></i>
            <p>
              Ulasan Buku
            </p>
          </a>
        </li>
        
    <li class="nav-item">
      <a href="index.php?page=logout" class="nav-link">
        <i class="fas fa-sign-out-alt"></i>
        <p>
          Logout
        </p>
      </a>
    </li>
  </ul>
</nav>
      <!-- /.Akhir Menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

</aside>

<div class="content-wrapper">

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
</div>
</div>
</div>

</section>

<section class="content"