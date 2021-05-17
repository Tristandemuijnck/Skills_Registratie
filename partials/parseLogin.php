<?php
// include these files for the functions and database info
include_once "resources/database.php";
include_once "resources/utilities.php";

//  if the login button is pressed this function searches the given data in the database
// and if there are empty fields left it will show errors with the info on what field is empty
// otherwise itll get the information from the database and logs the user in
// we want the password to be stored in hashed format and while the statement is being executed
// we want the info to be fetched and the cookie gets active and sets a time for how long itll be active till the user gets logged off
// if everything is succesfull i want the site to give a popup message saying welcome back and you are being logged in which is set on a timer as well
// and automatically sends you to the index.php but in ['username'] mode:
if (isset($_POST["loginBtn"])) {
       //process the form
       //array errors
    $form_errors = array();

    // Validation
    $required_fields = array('emailadres', 'wachtwoord');
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

    if (empty($form_errors)) {

        $form_errors = array();
        //collect form data
        $email = $_POST['emailadres'];
        $wachtwoord = $_POST['wachtwoord'];
        isset($_POST['remember']) ? $remember = $_POST['remember'] : $remember = "";

        //check if user exist in the database   
        $sqlQuery = "SELECT * FROM particulier WHERE emailadres = :emailadres and titel = :titel"; //select all from user table where username = :username in database(checks if this is valid)
        $statement = $db->prepare($sqlQuery); 
        $statement->execute(array(':emailadres' => $email, ':titel' => $titel));


        if($row = $statement->fetch()) {
            $id = $row['user_ID'];
            $hashed_password = $row['wachtwoord'];
            $voornaam = $row['naam'];
            $titel = $row['titel'];


            
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

                    // if($titel == "admin"){
                    //     redirectTo("signupnew");
                    // }
                    // elseif($titel == "particulier")
                    
                    switch(isset($_POST['titel'])){
                        case "admin":
                            redirectTo("signupnew");
                            break;
                        case "particulier":
                            redirectTo("home");
                            break;
                        case "leerling":
                            redirectTo("home");
                            break;
                        case "bedrijf":
                            redirectTo("home");
                            break;
                        case "overheid":
                            redirectTo("home");
                            break;
                        default:
                        redirectTo("home");

                    }
                   
                } else 
                // this will show a message above the login form saying the message written inside, styled nicely
                {
                    $result = flashMessage("You have entered an invalid password!");
                }
            }

        }else{
            $result = flashMessage("You have entered an invalid email");
        }
        // counts the amount of errors and shows this + where the errors occurred
    }    else {
        if (count($form_errors) == 1) {
            $result = flashMessage("There was 1 error in the form");
        } else {
            $result = flashMessage("There were " . $form_errors . " errors in the form");
        }
    }
 
    
?>