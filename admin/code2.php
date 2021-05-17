<?php
include('security.php');
include('../resources/utilities.php');
include('../resources/database.php');


// aboutus delete script 

if(isset($_POST['about_delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM bd_vacature WHERE ID='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['succes'] = "Your Data is DELETED";
        header('Location: vacaturesaccept.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";
        header('Location: vacaturesaccept.php');
    }

}

// aboutus update script

if(isset($_POST['update_btn'])){
    
    $id = $_POST['bedrijf_ID'];
    $bedrijfsnaam = $_POST['bedrijfsnaam'];
    $omschrijving = $_POST['omschrijving'];
    $vacature = $_POST['vacature'];
    $stageplek = $_POST['stageplek'];
    $startdatum = $_POST['startdatum'];
    $functieomschrijving = $_POST['functieomschrijving'];
    $type = $_POST['type'];

    
    $query = "UPDATE bd_vacature SET bedrijf_id='$bedrijf_id', bedrijfsnaam='$bedrijfsnaam', omschrijving='$omschrijving', vacature='$vacature', stageplek='$stageplek', startdatum= '$startdatum', 
    functieomschrijving='$functieomschrijving', type='$type=' WHERE ID=$id";
    $query_run = mysqli_query($connection, $query);
        
    if($query_run){
        $_SESSION['success'] = "Your Data is updated";
        header('Location: vacatures_bd.php');
    }
    else{
        $_SESSION['status'] = "Your Data is NOT updated";
        header('Location: vacatures_bd.php');
    } 
}


// Aboutus save script
if(isset($_POST['about_save'])){
    $bedrijfsnaam = $_POST['bedrijfsnaam'];
    $omschrijving = $_POST['omschrijving'];
    $vacature = $_POST['vacature'];
    $stageplek = $_POST['stageplek'];
    $startdatum = $_POST['startdatum'];
    $functieomschrijving = $_POST['functieomschrijving'];
    $type = $_POST['type'];

    $query = "INSERT INTO bd_vactures (bedrijfsnaam, omschrijving, vacture, stageplek, startdatum, functieomschrijving, type) VALUES ('$bedrijfsnaam', '$omschrijving', '$vacture', '$stageplek', '$startdatum', '$functieomschrijving1', '$type')";
    $query_run = mysqli_query($connection, $query);

    if($query_run){
        $_SESSION['success'] = "About Us Added";
        header('Location: vacatures_bd.php');
    }
    else{
        $_SESSION['status'] = "About Us Not Added";
        header('Location: vacatures_bd.php');      
    }

}
// Nieuwe vacature
if(isset($_POST['vacature_save'])){

    $bedrijfsnaam = $_POST['bedrijfsnaam'];
    $omschrijving = $_POST['omschrijving'];
    $vacature = $_POST['vacature'];
    $stageplek = $_POST['stageplek'];
    $startdatum = $_POST['startdatum'];
    $functieomschrijving = $_POST['functieomschrijving'];
    $type = $_POST['type'];



    $query = "INSERT INTO bd_vacture (bedrijf_id, bedrijfsnaam, omschrijving, vacture, stageplek, startdatum, functieomschrijving, type) VALUES ('$bedrijf_id'$bedrijfsnaam', '$omschrijving', '$vacture', '$stageplek', '$startdatum', '$functieomschrijving1', '$type')";
    $query_run = mysqli_query($connection, $query);

    if($query_run){
        $_SESSION['success'] = "Nieuwe vacature toegevoegd";
        header('Location: vacatures_bd.php');
    }
    else{
        $_SESSION['status'] = "Vacature niet toegevoegd";
        header('Location: vacatures_bd.php');      
    }

}

//Nieuwe admin toevoegen
if (isset($_POST['registerbtn'], $_POST['token'])) {

    // if(validate_token($_POST['token'])){
    if (validate_token($_POST['token'])) {

        // if ($_SESSION['token']) {
        // echo $_SESSION['token'];
        // }
        // process the form
        $form_errors = array();

        //form validations
        $required_fields = array('emailadres', 'wachtwoord');

        // call the function to check empty fields
        $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

        $fields_to_check_length = array('wachtwoord' => 6);

        //call the function to check minimum req length n merge the return data
        $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));

        //email validation
        $form_errors = array_merge($form_errors, check_email($_POST));

        $naam = $_POST['naam'];
        $achternaam = $_POST['achternaam'];
        $wachtwoord = $_POST['wachtwoord'];
        $emailadres = $_POST['emailadres'];
        $confirmwachtwoord = $_POST['confirmpassword'];
        
        if (checkDuplicateEntries("admin", "emailadres", $emailadres, $db)) {
            $result = flashMessage("Email is already taken, please try another one...");
        } elseif (empty($form_errors)) {

        if ($wachtwoord === $confirmwachtwoord) {

            $hashed_password = password_hash($wachtwoord, PASSWORD_DEFAULT);
            try {
                $sqlInsert = "INSERT INTO admin(naam, achternaam, wachtwoord, emailadres)
                    VALUES(:naam, :achternaam, :wachtwoord, :emailadres)";

                $statement = $db->prepare($sqlInsert);
                $statement->execute(array(':naam' => $naam, ':achternaam' => $achternaam, ':wachtwoord' => $hashed_password, ':emailadres' => $emailadres));

                if ($statement->rowCount() == 1) {
                    $user_id = $db->lastInsertId(); // this targets the Last inserted ID added to the database
                    $encode_id = base64_encode("encodeuserid{$user_id}"); //  
                    // if the mail was sent we show a message saying to check their mail

                    echo "Saved";
                    $_SESSION['succes'] = "Admin Profile Added";
                    redirectTo('register');
            
                }
            } catch (PDOException $ex) {
                
                $_SESSION['status'] = "Admin Profile NOT Added";
                redirectTo('register');
            
            }
        } else{
        redirectTo('register');
                
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

//Update admin-data script

if(isset($_POST['update_admin_btn']))
{
    $id = $_POST['edit_id'];
    $naam = $_POST['edit_naam'];
    $achternaam = $_POST['edit_achternaam'];
    $email = $_POST['edit_email'];
    $current_password = $_POST['edit_currentwachtwoord'];
    $wachtwoord1 = $_POST['edit_newwachtwoord'];
    $wachtwoord2 = $_POST['edit_confirmwachtwoord'];
    
        $query = "UPDATE admin SET naam='$naam', achternaam='$achternaam', emailadres='$email'
                WHERE admin_ID='$id' ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            $_SESSION['succes'] = "Your data is updated";
            header('Location: register.php');
        }
        else
        {
            $_SESSION['status'] = "Your data is NOT updated";
            header('Location: register.php');
        }
    }

    //Update User Data

if(isset($_POST['update_user_btn']))
{
    $id = $_POST['edit_id'];
    $naam = $_POST['edit_naam'];
    $achternaam = $_POST['edit_achternaam'];
    $email = $_POST['edit_email'];
    $current_password = $_POST['edit_currentwachtwoord'];
    $wachtwoord1 = $_POST['edit_newwachtwoord'];
    $wachtwoord2 = $_POST['edit_confirmwachtwoord'];
    
        $query = "UPDATE particulier SET naam='$naam', achternaam='$achternaam', emailadres='$email'
                WHERE user_ID='$id' ";

        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            $_SESSION['succes'] = "Your data is updated";
            header('Location: users.php');
        }
        else
        {
            $_SESSION['status'] = "Your data is NOT updated";
            header('Location: users.php');
        }
    }


    // accepteer sollicitant
    if(isset($_POST['accept_sollicitant_btn']))
    {
        $id = $_POST['sollicitant_id'];
    
            $query = "UPDATE bd_vacature SET status='geaccepteerd'
                    WHERE bedrijf_ID='$id' ";
    
            $query_run = mysqli_query($connection, $query);
    
            if($query_run)
            {
                $_SESSION['succes'] = "Your data is updated";
                header('Location: vacaturesaccept.php');
            }
            else
            {
                $_SESSION['status'] = "Your data is NOT updated";
                header('Location: vacaturesaccept.php');
            }
        }


// Delete User
if(isset($_POST['weigeren_btn']))
{
    $id = $_POST['delete_user_id'];

    $query = "UPDATE bd_vacature SET status='geweigerd'
                WHERE bedrijf_ID='$id' ";
    $query_run = mysqli_query($connection, $query);

    
    if($query_run)
    {
        $_SESSION['succes'] = "Your Data is Changed";
        header('Location: vacaturesaccept.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is not DELETED";
        header('Location: vacaturesaccept.php');
    }

}



// // Delete User
// if(isset($_POST['delete_btn']))
// {
//     $id = $_POST['delete_user_id'];

//     $query = "DELETE FROM bd_vacature WHERE user_ID='$id' ";
//     $query_run = mysqli_query($connection, $query);

//     if($query_run)
//     {
//         $_SESSION['succes'] = "Your Data is DELETED";
//         header('Location: vacaturesaccept.php');
//     }
//     else
//     {
//         $_SESSION['status'] = "Your Data is not DELETED";
//         header('Location: vacaturesaccept.php');
//     }

// }

// Gaat over sollicitatie

if(isset($_POST['delete_sollicitant_btn']))
{
    $id = $_POST['delete_user_id'];

    $query = "DELETE FROM sollicitatie WHERE user_ID='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['succes'] = "Sollicitant gedeletet";
        header('Location: pendingsollicitatie.php');
    }
    else
    {
        $_SESSION['status'] = "Sollicitant niet gedelete";
        header('Location: pendingsollicitatie.php');
    }

}

// Vacature dinges

    if(isset($_POST['update_vacature_btn'])){
    
        $bedrijfsnaam = $_POST['edit_bedrijfsnaam'];
        $omschrijving = $_POST['edit_omschrijving'];
        $vacature = $_POST['edit_vacature'];
        $stageplek = $_POST['edit_stageplek'];
        $startdatum = $_POST['edit_startdatum'];
        $functieomschrijving = $_POST['edit_functieomschrijving'];
        $type = $_POST['edit_type'];
        
        $query = "INSERT INTO bd_vactures (bedrijfsnaam, omschrijving, vacture, stageplek, startdatum, functieomschrijving, type) VALUES ('$bedrijfsnaam', '$omschrijving', '$vacture', '$stageplek', '$startdatum', '$functieomschrijving1', '$type')";
        $query_run = mysqli_query($connection, $query);
            
       
        if($query_run){
            $_SESSION['success'] = "Vacature gewijzigd";
            header('Location: vacaturesaccept.php');
        }
        else{
            $_SESSION['status'] = "Vacature niet gewijzigd";
            header('Location: vacaturesaccept.php');
    
        }
        
    }

    // delete vacature

    if(isset($_POST['vacature_delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM bd_vacature WHERE user_ID='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['succes'] = "Vacature gedeletet";
        header('Location: vacaturesaccept.php');
    }
    else
    {
        $_SESSION['status'] = "Vacature is niet gedeleted";
        header('Location: vacaturesaccept.php');
    }
}


if(isset($_POST['faq_new'])){

    #$id= $_POST['id']; 
    $category = $_POST['categorie'];
    $antwoord = $_POST['antwoord'];
    $vraag = $_POST['vraag'];

    $query = "INSERT INTO faq (categoryid, question, answer) VALUES ('$category', '$vraag', '$antwoord')";
    $query_run = mysqli_query($connection, $query);

    if($query_run){
        $_SESSION['succes'] = "Nieuwe Faq toegevoegd";
        header('Location: faq.php');
    }
    else{
        $_SESSION['status'] = "Nieuwe Faq niet toegevoegd";
        header('Location: faq.php');
    }

}

if(isset($_POST['edit_faq'])){

    $id= $_POST['edit_id']; 
    $category = $_POST['edit_category'];
    $antwoord = $_POST['edit_answer'];
    $vraag = $_POST['edit_question'];

    $query = "UPDATE faq SET categoryid='$category', question='$vraag', answer='$antwoord' WHERE id=$id";
    $query_run = mysqli_query($connection, $query);

    if($query_run){
        $_SESSION['succes'] = "Faq aangepast";
        header('Location: faq.php');
    }
    else{
        $_SESSION['status'] = "Faq niet aangepast";
        header('Location: faq.php');

    }

}


if(isset($_POST['faq_delete'])){

    $id= $_POST['delete_id']; 
    $query = "DELETE FROM faq WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run){
        $_SESSION['succes'] = "Faq verwijderd";
        header('Location: faq.php');
    }
    else{
        $_SESSION['status'] = "Faq niet verwijderd";
        header('Location: faq.php');

    }

}




?>