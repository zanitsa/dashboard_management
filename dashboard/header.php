<?php
	require_once "../query/init.php";
  ob_start();

  $nama = "";
  $login = false;
  if(isset($_SESSION['user']))
  {
    $login = true;
    if($data = user($_SESSION['user'])){
      if($row = pg_fetch_assoc($data))
      {
        $nama = $row['nama'];
      }
    }
  }else
  {
    if($login == false){
      header('Location: ../index.php');
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Dashboard Management Apps - IT Admin</title>
    <!-- FONT AWESOME STYLE  -->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <!-- DATATABLES STYLE  -->
    <link rel="stylesheet" href="../assets/plugin/datatables/editor.dataTables.min.css">
    <link rel="stylesheet" href="../assets/plugin/datatables/dataTables.bootstrap.min.css">
    <!-- SELECT2 STYLE  -->
    <link rel="stylesheet" href="../assets/plugin/select2/select2.min.css">
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="../assets/css/dashboard.css" rel="stylesheet" />
    
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top" style="min-height: 50px; background-color: #222">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Dashboard Management App</a>
        </div>
        <div>
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="#" class="dropdown-toggle text-center" data-toggle="dropdown" aria-expandable="false">
                <?=$nama?>&nbsp<i class="fa fa-user"></i> <i class="fa fa-angle-down"></i>
              </a>
              <ul class="dropdown-menu" role="menu">
                <li role="presentation">
                  <a href="../query/logout.php" class="text-center" role="menuitem" tabindex="-1"><i class="fa fa-sign-out"></i> Logout</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
    </nav>

<div id="sidebar" class="sidebar navbar-collapse collapse" style="min-width: 15%">
    <nav class="sidebar-nav">
     <ul class="nav">
      <li class="nav-item">
         <a class="nav-link" href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="grup.php"><i class="fa fa-users"></i> Master Group</a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="master.php"><i class="fa fa-list"></i> Master Aplikasi</a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="userman.php"><i class="fa fa-cogs"></i> User Management</a>
      </li>
     </ul>
    </nav>
</div>