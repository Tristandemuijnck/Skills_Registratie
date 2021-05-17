<?php 
 error_reporting(E_ALL);  
require_once('resources/dbconfig.php');
include_once 'partials/header.php';
// include_once 'insert.php';
include_once 'insert.php';


if(!$_SESSION['user_ID']){
    
    sleep(1);
    header('Location: login.php');  
} else {

}




?>
<html>
    
<head>

<link rel="stylesheet" href="sollicitatie.css" Type="text/css" media="all">
</head>


<body>

<div id="banner">
  <img alt="my banner" style="width:100%;" src="images/banner2.jpg"  >
</div>

<!-- begin form -->
<div class="container">
        <div class="clearfix"></div>
        <form action="" method="POST" class="label" enctype="multipart/form-data">
        
   
  
          
  <div class="container">
    <br>
  <h2>Vacaturen toevoegen voor bedrijven</h2>
  <br>

  <form class="form-group" action="sendEmail.php" method="POST" >
  <form class="form-horizontal">
    <div class="form-group" >
      <label class="control-label col-sm-2" for="bedrijfsnaam">Bedrijfsnaam:</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" id="bedrijfsnaam" placeholder="Vul uw Bedrijfsnaam in" name="bedrijfsnaam" required>
      </div>
    </div>
   
    <div class="form-group" style="margin-top: 1em;">
      <label class="control-label col-sm-2" for="email">Vacature:</label>
      <div class="col-sm-3">          
      
      <select class="form-select" aria-label="Default select example" id="vacature" name="vacature" required>
    <option selected>Kies vacature...</option>
    <option value="Applicatie ontwikkeling">Applicatie ontwikkeling</option>
    <option value="ICT-Beheer">ICT-Beheer</option>
    <option value="Cyber Security">Cyber Security</option>
    </select>
      </div>
    </div>
 
    <div class="form-group" style="margin-top: 1em;">
      <label class="control-label col-sm-2" for="email">Stageplek</label>
      <div class="col-sm-3">          
      
    <select class="form-select" aria-label="Default select example" id="stage" name="stage" required>
    <option selected>Kies één van de onderstaande options</option>
    <option value="ja">Ja</option>
    <option value="nee">Nee</option>
    </select>
      </div>
    </div>
    <!-- <div class="form-group" style="margin-top: 1em;">
    <label class="control-label col-sm-7" for="myfile">Cv:</label>
    <div class="col-sm-10">  
    <input type="file" class="form-control-file" id="myfile" name="myfile" enctype="multipart/form-data" required>
  </div><br> -->
  <br>
  <h6>Bedrijfsomschrijving</h6>
  <textarea id="omschrijving" name="omschrijving" rows="4" cols="50" placeholder="Bedrijfsomschrijving">
</textarea><br><br>
<h6>Functieomschrijving</h6>
<textarea id="functieomschrijving" name="functieomschrijving" rows="4" cols="50" placeholder="Functieomschrijving">
</textarea>


  <!-- <div class="form-group" style="margin-top: 1em;">
    <label class="control-label col-sm-7" for="myfile">Motivatie brief:</label>
    <div class="col-sm-10">  
    <input type="file" class="form-control-file" id="myfile" name="myfile" required>
  </div> -->
 
  <br><br>
			<!-- <p>bericht</p>
			<textarea id="body" rows="5" placeholder="Type Message"></textarea>
			<br><br> -->

<label for="birthday">Begin stage</label>
<input type="date" id="stagebegin" name="stagebegin">

<label for="birthday">Einde Stage</label>
<input type="date" id="stageeinde" name="stageeinde">

<div class="form-check" style="margin-left: 0.5%; margin-top: 1em;" >
  <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
  <label class="form-check-label" for="exampleCheck1">
  <p>Door het aanvinken van deze knop gaat u akkoord met onze  <a href="javascript:void(0)">Voorwaarden en privacy</a>.</p>
  </label>
</div>

<br>

    <div class="form-group">        

            <input type="hidden" name="user_ID" id="user_ID" value=" <?php echo $_SESSION['user_ID'] ?> ">
            <input type="hidden" name="token" value="<?php if (function_exists('_token')) echo _token(); ?>">
      <div class="col-sm-offset-2 col-sm-10" style="margin-top: 1em;">

        <button type="submit" name="signupBtn" onclick="sendEmail()" value="Send An Email" class="btn btn-danger">Verzenden</button>
        <a href="vacatures.php" class="btn btn-warning"> Ga terug</a>

      </div>
    </div>
  </form>
 </div>
</form>
        
</div>
<!-- end form -->



<!-- Footer

</body>
</html>

<?php 
 include_once 'partials/parseFooter.php';
?>











<?php _token(); ?>

<?php 
include_once 'admin/includes/scripts.php';
include_once 'partials/parseFooter.php'; 