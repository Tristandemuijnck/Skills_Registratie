<?php
$page_title = "IT_Winkel - Register Page";
include_once 'partials/header.php';
include_once 'partials/parseSignupNew.php';
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

<head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

<form action="" method="POST" class="register">
    <div class="container py-2 col-md-8">
        <div class="row g-2">
        <h1>Register</h1>
                <p>Please fill in this form to create an account.</p>
            <div class="col-md g-2">
                <hr>
                    <div class="form-group">
                        <label for="naam"><b>Voornaam</b></label>
                        <input type="text" placeholder="Vul je naam in" name="naam" >
                    </div>
                    <div class="form-group">
                        <label for="tussenvoegsel"><b>Tussenvoegsel</b></label>
                        <input type="text" placeholder="Tussenvoegsel" name="tussenvoegsel">
                        </div>    
                    <div class="form-group">
                        <label for="achternaam"><b>Achternaam</b></label>
                        <input type="text" placeholder="Achternaam" name="achternaam" >
                    </div>
                    <div class="form-group">
                        <label for="geboortedatum"><b>Geboortedatum</b></label>
                        <br>
                        <input type="date" placeholder="Geboortedatum" name="geboortedatum" >
                    </div>
                    <div class="form-group">
                        <label for="geslacht"><b>Geslacht</b></label>
                        <input type="text" placeholder="Geslacht" name="geslacht" >
                    </div>
                    <div class="form-group">
                        <label for="land"><b>Land</b></label>
                        <input type="text" placeholder="Land" name="land" >
                    </div>
                    <div class="form-group">
                        <label for="plaats"><b>Plaats</b></label>
                        <input type="text" placeholder="Plaats" name="plaats" >
                    </div>
                
                    <div class="form-group">
                        <label for="adres"><b>Adres</b></label>
                        <input type="text" placeholder="Adres" name="adres" >
                    </div>
                </div>

                <div class="col-md g-2">
                    <div class="form-group">
                        <label for="leerlingnummer"><b>Leerlingnummer</b></label>
                        <input type="text" placeholder="Leerlingnummer" name="leerlingnummer" >
                    </div>
                    <div class="form-group">
                        <label for="postcode"><b>Postcode</b></label>
                        <input type="text" placeholder="Postcode" name="postcode" >
                    </div>
                    <div class="form-group">
                        <label for="huisnummer"><b>Huisnummer</b></label>
                        <input type="text" placeholder="Huisnummer" name="huisnummer" >
                    </div>
                    <div class="form-group">
                        <label for="telefoonnummer"><b>Telefoonnummer</b></label>
                        <input type="text" placeholder="Telefoonnummer" name="telefoonnummer" >
                    </div>
                    <div class="form-group">
                        <label for="mobielnummer"><b>Mobielnummer</b></label>
                        <input type="text" placeholder="Mobielnummer" name="mobielnummer" >
                    </div>
                    <div class="form-group">
                        <label for="email"><b>Email</b></label>
                        <input type="text" placeholder="Email" name="emailadres" >
                    </div>
                    <div class="form-group">
                        <label for="password"><b>Wachtwoord</b></label>
                        <input type="password" placeholder="Wachtwoord" name="wachtwoord" >
                    </div>
                    <div class="form-group">
                        <label for="password-repeat"><b>Repeat Password</b></label>
                        <input type="password" placeholder="Repeat Password" name="password-repeat" >
                    </div>
                </div>
            </div>
    <hr>

    <p>By creating an account you agree to our <a href="javascript:void(0)">Terms & Privacy</a>.</p>
    <input type="hidden" name="token" value="<?php $token = _token();
                                                    $token = $_SESSION['token'];
                                                    echo $token;  
                                                    ?>">
    <button type="submit" name="signupBtn" class="RegisterButton">Registreren</button>
  </div>

  <div class="container signin">
    <p>Heeft u al een account? <a href="login.php">Inloggen</a>.</p>
  </div>
</form>                                                                                