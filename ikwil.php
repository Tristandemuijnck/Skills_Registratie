<?php
include_once 'partials/header.php';
include_once 'ikwil_script.php';

?>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">

<br>

<div class="container-fluid col-md-4">

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Ik wil</h5>
    <h6 class="card-subtitle mb-2 text-muted">Een development opdracht indienen</h6>
    <p class="card-text">
        <hr>
    Wil jij een op maat gemaakte website laten maken of een webapplicatie laten ontwikkelen? Onze developers van TeamRockIT staan voor je klaar! Wij denken met je mee in oplossingen en adviseren waar nodig vanuit onze expertise. 
    Het hele proces van ontwerp, ontwikkeling en testen voordat het live gaat kan je met een gerust hart aan ons overlaten. Het development team specialiseert zich met name in HTML, CSS, Javascript, PHP, SQL, Java en Python en diverse CMS software.
    <br>
    <br>
    Na het indienen van de opdracht bespreken wij de opdracht door met de studenten en de vakspecialisten om de haalbaarheid in kaart te brengen. Als wij de opdracht kunnen aannemen dan plannen wij direct een afspraak met je in om de wensen en specificaties in kaart te brengen waarna wij aan de slag kunnen. 
    Wij houden je van iedere stap in het proces op de hoogte en maken doorlopend aanpassingen naar wens om uiteindelijk tot het beoogde resultaat te komen. 
    </p>  
  </div>
</div>
<br>
<br>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-danger"> 
    
    </h6>
  </div>


<div class="card-body ">

    <form action="" method="POST">  
        
        <input type="hidden" name="edit_id" value=" ">
        <div class="form-group">
            <label> Voornaam </label>
            <input type="text" name="naam" value="" class="form-control" placeholder="* Niet verplicht">
        </div>
        <br>
        <div class="form-group">
            <label> E-mail </label>
            <input type="email" name="email" value="" class="form-control" placeholder="* Niet verplicht">
        </div>
        <br>
            <label> Ik wil.. </label>
            <select class="form-select" name="form_select" placeholder="Maak een keuze">
                <option value=""></option>
                <option value="suggestie">graag iets suggereren.</option>
                <option value="vraag">een vraag stellen.</option>
            </select>
        <br>
        <div class="mb-3">
            <label for="Textarea" class="form-label">Beschijf je vraag of suggestie...</label>
            <textarea maxlength="255" class="form-control" id="Textarea" name="textarea" rows="3"></textarea>
        </div>
        <br>
            <a href="home.php" class="btn btn-danger"> Annuleer </a>
            <button type="submit" name="ikwilBtn" class="btn btn-primary"> Verstuur </button>
    </form>
    </div>
</div>
</div>
<!-- /.container-fluid -->
    
<br>
<br>

<?php

// includes
include('admin/includes/scripts.php');
include('partials/parseFooter.php');

?>


