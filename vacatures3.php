<?php
include_once 'partials/header.php';

?>
<html> 
  <head>
    <link rel="stylesheet" href="vacaturers2.css">
  </head>

<body>
<!-- <link rel="stylesheet" href="vacaturers.css"> -->

<div id="banner">
  <img alt="my banner" src="images/banner2.jpg">
</div>

<!-- begin card -->

<h1 class="vacature_h1">Vacatures</h1>

<div class="boxesContainer">

  <div class="cardBox">
    <div class="card">
      <div class="front">
        <h3>Applicatie ontwikkeling</h3>
        <p>Hover to flip</p>
        <strong>&#x21bb;</strong>
      </div>
      <div class="back">
        <h3>Back Side One</h3>
        <p>Content in card one</p>
        <a href="applicatieontwikkelaar.php">Meer informatie</a>
        <a href="sollicitatie.php">Soliciteren</a>
      </div>
    </div>
  </div>

  <div class="cardBox">
    <div class="card">
      <div class="front">
        <h3>ICT-Beheer</h3>
        <p>Hover to flip</p>
        <strong>&#x21bb;</strong>
      </div>
      <div class="back">
        <h3>Back Side Two</h3>
        <p>Content in card two</p>
        <a href="ict-beheer.php">Meer informatie</a>
      </div>
    </div>
  </div>

  <div class="cardBox">
    <div class="card">
      <div class="front">
        <h3>Cyber security</h3>
        <p>Hover to flip</p>
        <strong>&#x21bb;</strong>
      </div>
      <div class="back">
        <h3>Back Side Three</h3>
        <p>Content in card three</p>
        <a href="cyber-security.php">Meer informatie</a>
      </div>
    </div>
  </div>



<!-- end card -->





<?php
include_once 'admin/includes/scripts.php';
include_once 'partials/parseFooter.php';
?>
