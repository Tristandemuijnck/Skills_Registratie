<?php

// De oorsprong van elke variabele



// Database
$username = 'root';                                         // root/username
$dsn = 'mysql:host=localhost; dbname=it_winkel';            // database name + host
$password = "";                                             // password for database
$db = new PDO($dsn, $username, $password);                  // connectie database

// Partials



// header.php

$titel = "";                                                // vul hier de titel van de informatie op          
$_SESSION['user_ID'];                                       // Haalt de session op van de User_ID
$sqlQuery = "SELECT * FROM particulier WHERE user_ID = ?";  // Hiermee worden de STATEMENTS van de SQL beschreven      
$statement = $db->prepare($sqlQuery);                       // Hiermee bereid je de statement voor om uitgevoerd te worden
$data = array($_SESSION['user_ID']);                        // in de data variabel zet je de benodigde variabelen die in de statement->execute($data) terecht moeten komen
$statement->execute($data);                                 // Hiermee execute je de data die naar de database moet worden geupload
if($statement->rowCount() > 0) {}                           // Hiermee controleer je of je data binnen krijgt van de Database
$row = $statement->fetch(PDO::FETCH_ASSOC);                 // hiermee fetch je de data op via een bepaalde manier
$titel = $row["titel"];                                     // Hiermee reassign je de titel variable met de data uit de database 


// parseLogin2.php

if (isset($_POST["loginBtn"], $_POST['token'])) {           // Hiermee wordt gecontroleerd of de persoon op de knop loginBtn heeft gedrukt en of er een token aanwezig is
    if(validate_token($_POST['token'])){                    // Hiermee controleer je de token of deze wel echt is
    $form_errors = array();                                 // Hiermee maak je een formerror array aan
    $required_fields = array('emailadres', 'wachtwoord');   // 
    $form_errors = array_merge($form_errors, 
        check_empty_fields($required_fields)); // Validation
 
    if (empty($form_errors)) {
 
    //collect form data
    $email = $_POST['emailadres'];
    $wachtwoord = $_POST['wachtwoord'];
    isset($_POST['remember']) ? $remember = $_POST['remember'] : $remember = "";

    //check if user exist in the database   
    $sqlQuery = "SELECT * FROM particulier WHERE emailadres = :emailadres"; //select all from user table where username = :username in database(checks if this is valid)
    $statement = $db->prepare($sqlQuery); 
    $statement->execute(array(':emailadres' => $email));
        
    if($row = $statement->fetch()) {
        $id = $row['user_ID'];
        $hashed_password = $row['wachtwoord'];
        $voornaam = $row['naam'];
             
                if (password_verify($wachtwoord, $hashed_password)) {
                    $_SESSION['user_ID'] = $id;
                    $_SESSION['emailadres'] = $email;
    
                    $fingerprint = md5($_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);
                    $_SESSION['last_active'] = time();
                    $_SESSION['fingerprint'] = $fingerprint;
    
                    if($remember === "yes"){
                        rememberMe($id);
                    }
                    $result = flashMessage("Welcome back");
                    redirectTo("home");
                    
                        
                } else 
                //  this will show a message above the login form saying the message written inside, styled nicely
                {
                    $result = flashMessage("You have entered an invalid password!");
                }
                 
        }else{
            $result = flashMessage("You have entered an invalid email");
        }
         // counts the amount of errors and shows this + where the errors occurred
    } else {
        if (count($form_errors) == 1) {
            $result = flashMessage("There was 1 error in the form");
        } else {
            $result = flashMessage("There were " . count($form_errors) . " errors in the form");
        }
    }
    }
}





?>