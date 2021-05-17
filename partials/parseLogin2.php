<head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>
<?php
// LOGINPARSE CODE V2.
// AUTEURS: SIEM POSTMUS, VINCENZO VAN WIJK
// PROJECT it_winkel
//
// include these files for the functions and database info




// Tabel informatie voor programmeurs 
//
// user_ID	geslacht	titel	geboortedatum	naam	
// tussenvoegsel	achternaam	adres	huisnummer	postcode	
//plaats	land	telefoonnummer	mobielnummer	emailadres	wachtwoord

 

// Wanneer de user op login drukt wordt er gekeken of er op de knop loginBtn gedrukt is samen of er uberhaupt een token aanwezig is
if (isset($_POST["loginBtn"], $_POST['token'])) {
   //validate the token if its the right one
    // if ($_SESSION['token']) {
    //     echo $_SESSION['token'];
    // }
    
    
    if(validate_token($_POST['token'])){
       //process the form
       //array errors
    $form_errors = array();

    // Validation
    $required_fields = array('emailadres', 'wachtwoord');
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

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
    
                    
                    // $result = flashMessage("Welcome back");
                    // redirectTo("home");

                    echo "<script>
                    Swal.fire({
                        title: 'Login succesvol!',
                        icon: 'success',
                        showConfirmButton: false,
                    })
                    setTimeout(function(){
                        window.location.href = 'home.php';
                    }, 1500);
                    </script>";
                    
                    // exit(header("Location: home.php"));
                    
                    
                } else 
                // this will show a message above the login form saying the message written inside, styled nicely
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


