<?php
$title = 'Halaman Profilview';
session_start();
include('../aes128/config.php');
if(empty($_SESSION['username'])){
  header("location:../aes128/login.php");
}
$last = $_SESSION['username'];
$sqlupdate = "UPDATE users SET last_active=now() WHERE username='$last'";
$queryupdate = mysql_query($sqlupdate);
?>

<?php 
include('includes/header.php');
include('includes/navbar.php');
?>

<!DOCTYPE html>
<html>
  <?php
$user = $_SESSION['username'];
$query = mysql_query("SELECT namalengkap,statuslogin,lastactive FROM tb_user WHERE username='$user'");
$data = mysql_fetch_array($query);
?>
 <head>
    <title> <?php echo $data['namalengkap']; ?> - AES-128</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    
</head>
 <!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search -->
        <form
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                    aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                    aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small"
                                placeholder="Search for..." aria-label="Search"
                                aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

            

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $data['namalengkap']; ?></span>
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $data['statuslogin']; ?></span>
                    <img class="img-profile rounded-circle"
                                    src="img/user.png">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Settings
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                        Activity Log
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>

        </ul>

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">
 <div class="container-fluid px-4">
<h1 class="mt-4">User Profile </h1>
<ul class="breadcrumb mb-4">
              <li><i class="fa fa-home fa-lg">&nbsp;</i></li>
              <li><a href="index.php">Dashboard / &nbsp;</a></li>
              <li>User Profile</li>
            </ul>


<div class="row">
<div class="col-md-12">
<div class="box box-primary">
                <div class="box-header with-border">
                </div>
			    <!-- /.box-header -->
			    <div class="box-body">
                <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                <?php 
                                    $query = mysql_query("SELECT * FROM tb_user");
                                     $data = mysql_fetch_array($query);?>
                                <label>Nama Pengguna</label>
                                    <input type="text" class="form-control" readonly value="<?php echo $data['namalengkap'];?>" name="nama" required="required" placeholder="Nama Pengguna">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" name="lahir" readonly value="<?php echo $data['alamat'];?>" required="required" placeholder="Alamat">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Terdaftar</label>
                                    <input  class="form-control" name="tgl_lahir" readonly value="<?php echo $data['waktu'];?>" required="required" placeholder="Tanggal">
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" readonly value="<?php echo $data['username'];?>"  name="user" required="required" placeholder="Username">
                                </div>
                                
                                <div class="form-group">
                                    <label>Level</label>
                                    <input type="hiden" class="form-control" readonly value ="<?php echo $data['level'];?>" name="pass" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <input type="hiden" class="form-control" readonly value ="<?php echo $data['jenkel'];?>" name="pass" placeholder="">
                                </div>
                                
                                </div>




                                    </div> 
</div>

</html>


<?php 
include('includes/footer.php');
include('includes/scripts.php');
?>