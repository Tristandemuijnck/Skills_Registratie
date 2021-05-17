<?php

include_once 'resources/session.php';
include_once 'resources/database.php';
include_once 'head.php';
include_once 'resources/utilities.php';
$titel = "";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">



  <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Navbar brand -->
      <a class="navbar-brand" href="home.php">
      <img src="images/rockitlogo.png" width="" height="100px">
      </a>

    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      

      <?php
      
        if (isset($_SESSION['user_ID'])){
            $sqlQuery = "SELECT * FROM particulier WHERE user_ID = ?"; 
            $statement = $db->prepare($sqlQuery); 
            $data = array($_SESSION['user_ID']);
            $statement->execute($data);
            if($statement->rowCount() > 0) {
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                $titel = $row["titel"];
                // echo  "Rol: " . $titel;
                if ($titel == "particulier" || isCookieValid($db)) : ?>
            <li class="nav-item"><a class="nav-link" href="home.php">Home</a>
            <li class="nav-item"><a class="nav-link" href="vacatures.php">Vacatures</a><li>
            <li class="nav-item"><a class="nav-link" href="faq.php">FAQ</a></li>
            <li class="nav-item"><a class="nav-link" href="bd_vacatures.php">Vacature</a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php">Uitloggen</a></li>

                    <!-- Navbar dropdown -->
                    <li class="nav-item dropdown">
                          <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            id="navbarDropdown"
                            role="button"
                            data-mdb-toggle="dropdown"
                            aria-expanded="false"
                          >
                          <i class="fas fa-user-alt "></i>
                          </a>
                          <!-- Dropdown menu -->
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="logout.php">Uitloggen</a></li>
                            <li><a class="dropdown-item" href="#">Henkie</a></li>
                            <li><hr class="dropdown-divider" /></li>
                            <li>
                              <a class="dropdown-item" href="#">Something else here</a>
                            </li>
                          </ul>
                        </li>
                      
                <?php elseif ($titel == "admin" || isCookieValid($db)): ?>
                    <!-- if username is not active and there is no account available show -->
                    
            <li class="nav-item"><a class="nav-link" href="home.php">Home</a><li>
            <li class="nav-item"><a class="nav-link" href="admin/login.php">Admin Panel</a><li>
            <li class="nav-item"><a class="nav-link" href="#">Incident Management</a></li>
            <li class="nav-item"><a class="nav-link" href="faq.php">FAQ</a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php">Uitloggen</a><li>

                <?php endif;?>
                
                <?php }}
                else{?>
                        
            <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
            <li class="nav-item"><a class="nav-link" href="vacatures.php">Vacatures</a></li>
            <li class="nav-item"><a class="nav-link" href="over_ons.php">Over Ons</a></li>
            <li class="nav-item"><a class="nav-link" href="faq.php">FAQ</a></li>

                        
                        <!-- Navbar dropdown -->
                        <li class="nav-item dropdown">
                          <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            id="navbarDropdown"
                            role="button"
                            data-mdb-toggle="dropdown"
                            aria-expanded="false"
                          >
                          <i class="fas fa-user-alt "></i>
                          </a>
                          <!-- Dropdown menu -->
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="signupbedrijf.php">Registreer een bedrijfs account</a></li>
                            <li><a class="dropdown-item" href="signupnew.php">Registreer een klant account</a></li>
                            <li><hr class="dropdown-divider" /></li>
                            <li>
                              <a class="dropdown-item" href="#">Inloggen op Bedrijfs account</a>
                              <a class="dropdown-item" href="login.php">Inloggen op klant account</a>
                            </li>
                          </ul>
                        </li>
          <?php }?>

             
      </ul>
      <!-- Left links -->
      
      <li class="navbar-nav ms-auto mb-2 mb-lg-0">
            <button style="width: 150px; height: 65px;" type="button" class="btn btn-danger" data-mdb-toggle="modal"
              data-mdb-target="#ikwilModal">

              Ik Wil

            </button>

            <!-- <a class="nav-link" style="color: white; font-size:larger; font-size: 2em;" href="ikwil.php">Ik wil!</a> -->

          </li>
      

    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->




    <!-- Modal -->
    <div class="modal fade" id="ikwilModal" tabindex="-1" aria-labelledby="ikwilModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-side modal-bottom-right">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ikwilModalLabel">Ik wil een:</h5>
            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <!-- Bedrijf solliciteren -->
            <a href="tussenpagina.php" role="button" class="btn btn-info"
              data-mdb-content="Popover body content is set in this attribute.">Bedrijf solliciteren</a>

            <!-- Vraag/suggestie knop -->
            <a href="ikwil.php" role="button" class="btn btn-info"> Vraag stellen/suggestie opsturen </a>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-mdb-dismiss="modal">
              Sluit venster
            </button>
          </div>
        </div>
      </div>
    </div>

</head>



