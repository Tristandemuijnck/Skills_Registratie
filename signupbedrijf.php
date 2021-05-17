<?php
$page_title = "IT_Winkel - Register Page";
include_once 'partials/header.php';
include_once 'partials/parseSignupBedrijf.php';
include_once 'resources/utilities.php';
// 
// user_ID	geslacht	titel	geboortedatum	naam	
// tussenvoegsel	achternaam	adres	huisnummer	postcode	
//plaats	land	telefoonnummer	mobielnummer	emailadres	wachtwoord


?>


<link rel="stylesheet" href="css/signup.css">


<div>
    <?php
        if (isset($result)) echo $result; ?>
        <?php
        if (!empty($form_errors)) echo show_errors($form_errors); 
    ?>
</div>

<form action="" method="POST" class="register">
    <div class="container py-2 col-md-8">
        <div class="row g-2">
        <h1>Register</h1>
                <p>Please fill in this form to create an account.</p>
            <div class="col-md g-2">
                
                    <div class="form-group">
                        <label for="bedrijfsnaam"><b>Bedrijfs naam</b></label>
                        <input type="text" placeholder="Vul Bedrijfsnaam in..." name="bedrijfsnaam" >
                    </div>
                    <div class="form-group">
                        <label for="rechtsvorm"><b>Rechtsvorm</b></label>
                        <input type="text" placeholder="Vul Rechtsvorm in..." name="rechtsvorm" >
                    </div>
                    
                    <div class="form-group">
                        <label for="naam"><b>Naam</b></label>
                        <input type="text" placeholder="Vul Naam in..." name="naam" >
                    </div>
                    <div class="form-group">
                        <label for="emailadres"><b>Emailadres</b></label>
                        <input type="text" placeholder="Vul Emailadres in..." name="emailadres" >
                    </div>
                    
                    <div class="form-group">
                        <label for="postcode"><b>Postcode</b></label>
                        <input type="text" placeholder="Vul Postcode in..." name="postcode" >
                    </div>
                    <div class="form-group">
                        <label for="huisnummer"><b>Huisnummer</b></label>
                        <input type="text" placeholder="Vul Huisnummer in..." name="huisnummer" >
                    </div>
                    <div class="form-group">
                        <label for="wachtwoord"><b>Wachtwoord</b></label>
                        <input type="password" placeholder="Vul Wachtwoord in..." name="wachtwoord" >
                    </div>
                    
                    <div class="form-group">
                        <label for="datum_oprichting"><b>Datum Oprichting</b></label>
                        <input type="date" placeholder="Datum oprichting bedrijf..." name="datum_oprichting" >
                    </div>
            </div>
                <div class="col-md g-2">
                <div class="form-group">
                        <label for="kvk_nummer"><b>Kvk Nummer</b></label>
                        <input type="text" placeholder="Vul Kvk Nummer in..." name="kvk_nummer">
                    </div>    

                    <div class="form-group">
                        <label for="btw_nummer"><b>BTW nummer</b></label>
                        <input type="text" placeholder="Vul BTW Nummer in..." name="btw_nummer" >
                    </div>
                    <div class="form-group">
                        <label for="telefoonnummer"><b>Telefoonnummer</b></label>
                        <input type="text" placeholder="Vul Telefoonnummer in..." name="telefoonnummer" >
                    </div>
                    <div class="form-group">
                        <label for="adres"><b>Adres</b></label>
                        <input type="text" placeholder="Vul Adres in..." name="adres" >
                    </div>
                    
                    <div class="form-group">
                        <label for="plaats"><b>Plaats</b></label>
                        <input type="text" placeholder="Vul Plaats in..." name="plaats" >
                    </div>
                    <div class="form-group">
                        <label for="land"><b>Land</b></label>
                        <input type="text" placeholder="Vul Land in..." name="land" >
                    </div>
                    <div class="form-group">
                        <label for="confirmwachtwoord"><b>Confirm Wachtwoord</b></label>
                        <input type="password" placeholder="Vul Wachtwoord in..." name="confirmwachtwoord" >
                    </div>
                    
                    
                </div>
            </div>
    <hr>

    <p>By creating an account you agree to our <a href="javascript:void(0)">Terms & Privacy</a>.</p>
    <input type="hidden" name="token" value="<?php $token = _token();
                                                    $token = $_SESSION['token'];
                                                    echo $token;  
                                                    ?>">
    <button type="submit" name="signup_bedrijf_Btn" class="RegisterButton">Registreren</button>
  </div>

  <div class="container signin">
    <p>Heeft u al een account? <a href="login.php">Inloggen</a>.</p>
  </div>
</form>                                                                                