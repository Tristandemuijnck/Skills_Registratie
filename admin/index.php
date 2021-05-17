<?php
ob_flush();
include('security.php');
include('geentoegang.php');
include('includes/header.php'); 
include('includes/navbar.php');
?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
      class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Totaal Aantal Admins</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

              <?php
              
              $query = "SELECT admin_ID FROM admin ORDER BY admin_ID";
              $query_run = mysqli_query($connection, $query);
              
              $row = mysqli_num_rows($query_run);
              ?>
              <h4>Aantal Admins: 
              <?php
              echo '<h1>' . $row . '</h1>'
              
              ?>

              </h4>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user-tie fa-2x text-gray-300"></i>
              
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Totale User Aantal</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php

                // require 'dbconfig.php';
                
                $query = "SELECT titel FROM particulier ORDER BY titel";
                $query_run = mysqli_query($connection, $query);
                
                $row = mysqli_num_rows($query_run);

                ?>
                <h4>Aantal Users: 

                <?php
                echo '<h1>' . $row . '</h1>'
                ?>

                </h4>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Sollicitaties</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php

                // require 'dbconfig.php';
                
                $query = "SELECT user_ID FROM sollicitatie ORDER BY user_ID";
                $query_run = mysqli_query($connection, $query);
                
                $row = mysqli_num_rows($query_run);

                ?>
                <h4>Aantal Sollicitaties: 

                <?php
                echo '<h1>' . $row . '</h1>'
                ?>

                </h4>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Vacaturen</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php

                // require 'dbconfig.php';

                $query = "SELECT bedrijf_ID FROM bd_vacature ORDER BY bedrijf_ID";
                $query_run = mysqli_query($connection, $query);

                $row = mysqli_num_rows($query_run);

                ?>
                <h4>Aantal vacatures: 

                <?php
                echo '<h1>' . $row . '</h1>'
                ?>
              </div>
              </div>
            
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>

              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->








  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>