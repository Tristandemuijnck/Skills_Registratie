
<head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

<?php


// tabel namen
// user_ID	geslacht	titel	geboortedatum	naam	
// tussenvoegsel	achternaam	adres	huisnummer	postcode	
//plaats	land	telefoonnummer	mobielnummer	emailadres	wachtwoord



// if (isset($_POST['signupBtn'])){
// echo "treasure will be set if the form has been submitted (to TRUE, I believe)";
// }


    
    if (isset($_POST['signupBtn'], $_POST['token'])) {

    // if(validate_token($_POST['token'])){
    if (validate_token($_POST['token'])) {
        // process the form
        $form_errors = array();


        //form validations
        $required_fields = array('naam', 'achternaam', 'geboortedatum', 'geslacht', 'land', 'plaats', 'adres', 'huisnummer', 
                                 'telefoonnummer', 'mobielnummer', 'emailadres', 'wachtwoord');

        // call the function to check empty fields

        $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

        //fields that require min length of 4 chars
        $fields_to_check_length = array('wachtwoord' => 6);

        //call the function to check minimum req length n merge the return data

        $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));

        //email validation
        $form_errors = array_merge($form_errors, check_email($_POST));

        $geslacht = $_POST['geslacht'];
        $titel = "particulier";
        $geboortedatum = $_POST['geboortedatum'];
        $voornaam = $_POST['naam'];
        $tussenvoegsel = $_POST['tussenvoegsel'];
        $achternaam = $_POST['achternaam'];
        $adres = $_POST['adres'];
        $leerlingnummer = $_POST['leerlingnummer'];
        $plaats = $_POST['plaats'];
        $land = $_POST['land'];
        $postcode = $_POST['postcode'];
        $mobielnummer = $_POST['mobielnummer'];
        $huisnummer = $_POST['huisnummer'];
        $telefoonnummer = $_POST['telefoonnummer'];
        $wachtwoord = $_POST['wachtwoord'];
        $email = $_POST['emailadres'];

        if (checkDuplicateEntries("particulier", "emailadres", $email, $db)) {
            $result = flashMessage("Email is already taken, please try another one...");
        } elseif (empty($form_errors)) {

            $hashed_password = password_hash($wachtwoord, PASSWORD_DEFAULT);
            try {
                $sqlInsert = "INSERT INTO particulier(geslacht, titel, geboortedatum, naam, tussenvoegsel, achternaam, adres, leerlingnummer, huisnummer, postcode, plaats, land, telefoonnummer, mobielnummer, emailadres, wachtwoord)
                    VALUES(:geslacht, :titel, :geboortedatum, :naam, :tussenvoegsel, :achternaam, :adres, :huisnummer, :postcode, :plaats, :leerlingnummer, :land, :telefoonnummer, :mobielnummer, :emailadres, :wachtwoord)";

                $statement = $db->prepare($sqlInsert);
                $statement->execute(array(':geslacht' => $geslacht, ':titel' => $titel, ':geboortedatum' => $geboortedatum, ':naam' => $voornaam, ':tussenvoegsel' => $tussenvoegsel, ':achternaam' => $achternaam, ':adres' => $adres,
                ':leerlingnummer' => $leerlingnummer, ':huisnummer' => $huisnummer, ':postcode' => $postcode, ':plaats' => $plaats, ':land' => $land, ':telefoonnummer' => $telefoonnummer, ':mobielnummer' => $mobielnummer, ':emailadres' => $email, ':wachtwoord' => $hashed_password));

                if ($statement->rowCount() == 1) {
                    $user_id = $db->lastInsertId(); // this targets the Last inserted ID added to the database
                    $encode_id = base64_encode("encodeuserid{$user_id}"); //  
                    // if the mail was sent we show a message saying to check their mail

                        // echo "Registration succesful!";
                        echo "<script>
                        Swal.fire({
                            title: 'Registratie succesvol!',
                            icon: 'success',
                            showConfirmButton: false,
                        })
                        setTimeout(function(){
                            window.location.href = 'home.php';
                        }, 4000);
                        </script>";

                       



                }
            } catch (PDOException $ex) {

                $result = flashMessage("An error occurred: " . $ex->getMessage());
            }
        } else {
            if (count($form_errors) == 1) {
                $result = flashMessage("There was 1 error in the form<br>");
            } else {
                $result = flashMessage("There were " . count($form_errors) . " errors in the form <br>");
            }

        }  
    }


}


?>
