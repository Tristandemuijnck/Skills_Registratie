
<?php


// tabel namen

// bedrijf_ID	bedrijfsnaam	kvk_nummer	btw_nummer	naam emailadres wachtwoord	telefoonnummer	adres	postcode	
// rechtsvorm	huisnummer	plaats	land	datum_oprichting

    
    if (isset($_POST['signup_bedrijf_Btn'], $_POST['token'])) {

    // if(validate_token($_POST['token'])){
    if (validate_token($_POST['token'])) {
        // process the form
        $form_errors = array();


        //form validations
        $required_fields = array('bedrijfsnaam', 'kvk_nummer', 'btw_nummer', 'rechtsvorm', 'naam', 'emailadres', 'wachtwoord', 'telefoonnummer', 'adres', 
                                 'postcode', 'huisnummer', 'plaats', 'land', 'datum_oprichting');

        // call the function to check empty fields

        $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

        //fields that require min length of 4 chars
        $fields_to_check_length = array('wachtwoord' => 6);

        //call the function to check minimum req length n merge the return data

        $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));

        //email validation
        $form_errors = array_merge($form_errors, check_email($_POST));

        $bedrijfsnaam = $_POST['bedrijfsnaam'];
        $kvk_nummer = $_POST['kvk_nummer'];
        $btw_nummer = $_POST['btw_nummer'];
        $rechtsvorm = $_POST['rechtsvorm'];
        $naam = $_POST['naam'];
        $emailadres = $_POST['emailadres'];
        $wachtwoord = $_POST['wachtwoord'];
        $confirmwachtwoord = $_POST['confirmwachtwoord'];
        $telefoonnummer = $_POST['telefoonnummer'];
        $adres = $_POST['adres'];
        $postcode = $_POST['postcode'];
        $huisnummer = $_POST['huisnummer'];
        $plaats = $_POST['plaats'];
        $land = $_POST['land'];
        $datum_oprichting = $_POST['datum_oprichting'];

        if (checkDuplicateEntries("bedrijf", "emailadres", $emailadres, $db)) {
            $result = flashMessage("Email is already taken, please try another one...");
        } elseif (empty($form_errors)) {

            if ($wachtwoord === $confirmwachtwoord) {

            $hashed_password = password_hash($wachtwoord, PASSWORD_DEFAULT);
            try {
                $sqlInsert = "INSERT INTO bedrijf(bedrijfsnaam, kvk_nummer, btw_nummer, naam, emailadres, wachtwoord, telefoonnummer, adres, postcode, rechtsvorm, huisnummer, plaats, land, datum_oprichting)
                    VALUES(:bedrijfsnaam, :kvk_nummer, :btw_nummer, :naam, :emailadres, :wachtwoord, :telefoonnummer, :adres, :postcode, :huisnummer, :rechtsvorm, :plaats, :land, :datum_oprichting)";

                $statement = $db->prepare($sqlInsert);
                $statement->execute(array(':bedrijfsnaam' => $bedrijfsnaam, ':kvk_nummer' => $kvk_nummer, ':btw_nummer' => $btw_nummer, ':naam' => $naam, ':emailadres' => $emailadres, ':wachtwoord' => $hashed_password,
                ':telefoonnummer' => $telefoonnummer, ':adres' => $adres, ':postcode' => $postcode, ':rechtsvorm' => $rechtsvorm, ':huisnummer' => $huisnummer, ':plaats' => $plaats, ':land' => $land, ':datum_oprichting' => $datum_oprichting));

                if ($statement->rowCount() == 1) {
                    $bedrijf_ID = $db->lastInsertId(); // this targets the Last inserted ID added to the database
                    $encode_id = base64_encode("encodeuserid{$bedrijf_ID}"); //  
                    // if the mail was sent we show a message saying to check their mail

                    echo "<script type=\"text/javascript\">
                    Swal.fire({
                        title: 'Bedrijf's registratie succesvol!',
                        icon: 'success',
                        showConfirmButton: false,
                    })
                    setTimeout(function(){
                        window.location.href = 'home.php';
                    }, 3000);
                    </script>";



                }
            } catch (PDOException $ex) {

                $result = flashMessage("An error occurred: " . $ex->getMessage());
                redirectTo('signupbedrijf');
            }
        } 
         else {
            if (count($form_errors) == 1) {
                $result = flashMessage("There was 1 error in the form<br>");
            } else {
                $result = flashMessage("There were " . count($form_errors) . " errors in the form <br>");
            }

        }  
    }
    }

}


?>
