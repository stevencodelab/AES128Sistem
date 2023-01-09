<?php
$title = 'Halaman Data User';
session_start();
include('../aes128/config.php');
if(empty($_SESSION['username'])){
header("location:../aes128/login.php");
}
$last = $_SESSION['username'];
$sqlupdate = "UPDATE tb_user SET lastactive=now() WHERE username='$last'";
$queryupdate = mysql_query($sqlupdate);
?>

<?php include('includes/header.php');?>
<?php include('includes/navbar.php');?>

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
    <link rel="stylesheet" type="text/css" href="../aes128/plugins/datatables/js/jquery.dataTables.js">
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

                        
                        <ul class="navbar-nav ml-auto">
                    <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="" id="userDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <div>
        <span id="salam" class="mr-2 d-none d-lg-inline text-gray-600 small"><?php
//  Setting Waktu Indonesia
date_default_timezone_set('Asia/Jakarta');

// Format Waktu 24 Jam
$jam = date('G');
if ( $jam >= 5 && $jam <= 11 ) {
    echo "Selamat Pagi";
} else if ( $jam >= 12 && $jam <= 18 ) {
    echo "Siang Ceria";
} else if ( $jam >= 19 || $jam <= 4 ) {
    echo "Selamat Malam ";
}
?></span>
        <span id="jam" class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
    </div>
    
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
                                <a class="dropdown-item" href="profilview.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
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
<h1 class="mt-4">Data User</h1>
<ul class="breadcrumb mb-4">
              <li><i class="fa fa-home fa-lg">&nbsp;</i></li>
              <li><a href="index.php">Dashboard / &nbsp;</a></li>
              <li>Daftar User</li>
            </ul>


<div class="row">
<div class="col-md-12">
  <div class="card">
  <div class="card-header">
    <h4></h4>

  </div>
  
  <div class="card-body">

  <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tabelku" class="table table-row table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Username</th>
                                            <th>Nama Lengkap</th>
                                            <th>Status Login</th>
                                            <th>Waktu Terdaftar</th>
                                
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $query = mysql_query("SELECT * FROM tb_user");
                                    while ($data = mysql_fetch_array($query)) { ?>
                                    <tr>
                                       <td><?php echo $data['username'];?></td>
                                       <td><?php echo $data['namalengkap'];?></td>
                                       <td><?php echo $data['statuslogin'];?></td>
                                       <td><?php echo $data['waktu'];?></td>
                                      
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
  </div>
  </div>
</html>
                                    
                                
<?php 
include('includes/footer.php');
include('includes/scripts.php'); 
?>  
            
