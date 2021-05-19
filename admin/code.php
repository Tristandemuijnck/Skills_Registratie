<?php
include('security.php');
include('../resources/utilities.php');
include('../resources/database.php');

// aboutus delete script 

if(isset($_POST['about_delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM abouts WHERE ID='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['succes'] = "Your Data is DELETED";
        header('Location: aboutus.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";
        header('Location: aboutus.php');
    }

}

// aboutus update script

if(isset($_POST['update_btn'])){
    
    $id = $_POST['edit_id'];
    $title = $_POST['edit_title'];
    $subtitle = $_POST['edit_subtitle'];
    $description = $_POST['edit_description'];
    $links = $_POST['edit_links'];
    
    $query = "UPDATE abouts SET title='$title', subtitle='$subtitle', description='$description', links='$links' WHERE ID=$id";
    $query_run = mysqli_query($connection, $query);
        
    if($query_run){
        $_SESSION['success'] = "Your Data is updated";
        header('Location: aboutus.php');
    }
    else{
        $_SESSION['status'] = "Your Data is NOT updated";
        header('Location: aboutus.php');
    } 
}


// Aboutus save script
if(isset($_POST['about_save'])){
    $title = $_POST['title'];
    $subtitle= $_POST['subtitle'];
    $description = $_POST['description'];
    $links = $_POST['links'];

    $query = "INSERT INTO abouts (title, subtitle, description, links) VALUES ('$title', '$subtitle', '$description', '$links')";
    $query_run = mysqli_query($connection, $query);

    if($query_run){
        $_SESSION['success'] = "About Us Added";
        header('Location: aboutus.php');
    }
    else{
        $_SESSION['status'] = "About Us Not Added";
        header('Location: aboutus.php');      
    }

}
// Nieuwe vacature
if(isset($_POST['vacature_save'])){
    $title = $_POST['title'];
    $subtitle= $_POST['subtitle'];
    $description = $_POST['description'];
    $links = $_POST['links'];

    $query = "INSERT INTO vacature (title, subtitle, description, links) VALUES ('$title', '$subtitle', '$description', '$links')";
    $query_run = mysqli_query($connection, $query);

    if($query_run){
        $_SESSION['success'] = "Nieuwe vacature toegevoegd";
        header('Location: vacatures_admin.php');
    }
    else{
        $_SESSION['status'] = "Vacature niet toegevoegd";
        header('Location: vacatures_admin.php');      
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


//Nieuwe Medewerker toevoegen
if (isset($_POST['addmedewerkerbtn'], $_POST['token'])) {

    // if(validate_token($_POST['token'])){
    if (validate_token($_POST['token'])) {

        // if ($_SESSION['token']) {
        // echo $_SESSION['token'];
        // }
        // process the form
        $form_errors = array();

        //form validations
        $required_fields = array('email', 'wachtwoord', 'naam', 'achternaam', 'confirmpassword');

        // call the function to check empty fields
        $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

        $fields_to_check_length = array('wachtwoord' => 6);

        //call the function to check minimum req length n merge the return data
        $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));

        //email validation
        $form_errors = array_merge($form_errors, check_email($_POST));

        $naam = $_POST['naam'];
        $tussenvoegsel = $_POST['tussenvoegsel'];
        $achternaam = $_POST['achternaam'];
        $emailadres = $_POST['email'];
        $wachtwoord = $_POST['wachtwoord'];
        $confirmwachtwoord = $_POST['confirmpassword'];
        
        if (checkDuplicateEntries("medewerker", "email", $emailadres, $db)) {
            $result = flashMessage("Email is already taken, please try another one...");
        } elseif (empty($form_errors)) {

        if ($wachtwoord === $confirmwachtwoord) {

            $hashed_password = password_hash($wachtwoord, PASSWORD_DEFAULT);
            try {
                $sqlInsert = "INSERT INTO medewerker(naam, tussenvoegsel, achternaam, wachtwoord, email)
                VALUES(:naam, :tussenvoegsel, :achternaam, :wachtwoord, :email)";

                $statement = $db->prepare($sqlInsert);
                $statement->execute(array(':naam' => $naam, ':tussenvoegsel' => $tussenvoegsel, ':achternaam' => $achternaam, ':wachtwoord' => $hashed_password, ':email' => $emailadres));

                if ($statement->rowCount() == 1) {
                    $user_id = $db->lastInsertId(); // this targets the Last inserted ID added to the database
                    $encode_id = base64_encode("encodeuserid{$user_id}"); //  
                    // if the mail was sent we show a message saying to check their mail

                    echo "Saved";
                    $_SESSION['succes'] = "Medewerker Profile Added";
                    redirectTo('medewerker');
            
                }
            } catch (PDOException $ex) {
                
                $_SESSION['status'] = "Medewerker Profile NOT Added";
                redirectTo('medewerker');
            
            }
        } else{
        redirectTo('medewerker');
                
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

//Delete medewerker

if(isset($_POST['delete_medewerker_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM medewerker WHERE medewerker_ID='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['succes'] = "Your Data is DELETED";
        header('Location: medewerker.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is not DELETED";
        header('Location: medewerker.php');
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


    // Delete User
if(isset($_POST['weigeren_btn']))
{
    $id = $_POST['delete_user_id'];

    $query = "UPDATE sollicitatie SET status='geweigerd'
    WHERE user_ID='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['succes'] = "Your Data is DELETED";
        header('Location: pendingsollicitatie.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is not DELETED";
        header('Location: pendingsollicitatie.php');
    }

}

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

//Delete admin-user script

if(isset($_POST['delete_geweigerd_btn']))
{
    $id = $_POST['delete_user_id'];

    $query = "DELETE FROM bd_vacature WHERE bedrijf_ID='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['succes'] = "Your Data is DELETED";
        header('Location: vacaturesaccept.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is not DELETED";
        header('Location: vacaturesaccept.php');
    }
}

    // accepteer sollicitant
    if(isset($_POST['accept_sollicitant_btn']))
    {
        $id = $_POST['sollicitant_id'];
    
            $query = "UPDATE sollicitatie SET status='geaccepteerd'
                    WHERE user_ID='$id' ";
    
            $query_run = mysqli_query($connection, $query);
    
            if($query_run)
            {
                $_SESSION['succes'] = "Your data is updated";
                header('Location: pendingsollicitatie.php');
            }
            else
            {
                $_SESSION['status'] = "Your data is NOT updated";
                header('Location: pendingsollicitatie.php');
            }
        }



//Delete admin-user script

if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete__admin_id'];

    $query = "DELETE FROM admin WHERE admin_ID='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['succes'] = "Your Data is DELETED";
        header('Location: register.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is not DELETED";
        header('Location: register.php');
    }

}

// Delete User
if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_user_id'];

    $query = "DELETE FROM particulier WHERE user_ID='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['succes'] = "Your Data is DELETED";
        header('Location: users.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is not DELETED";
        header('Location: users.php');
    }

}

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
    
        $id = $_POST['edit_id'];
        $title = $_POST['edit_title'];
        $subtitle = $_POST['edit_subtitle'];
        $description = $_POST['edit_description'];
        $links = $_POST['edit_links'];
        
        $query = "UPDATE vacature SET title='$title', subtitle='$subtitle', description='$description', links='$links' WHERE ID=$id";
        $query_run = mysqli_query($connection, $query);
            
       
        if($query_run){
            $_SESSION['success'] = "Vacature gewijzigd";
            header('Location: vacatures_admin.php');
        }
        else{
            $_SESSION['status'] = "Vacature niet gewijzigd";
            header('Location: vacatures_admin.php');
    
        }
        
    }

    // delete vacature

    if(isset($_POST['vacature_delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM vacature WHERE ID='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['succes'] = "Vacature gedeletet";
        header('Location: vacatures_admin.php');
    }
    else
    {
        $_SESSION['status'] = "Vacature is niet gedeleted";
        header('Location: vacatures_admin.php');
    }
}

// Faq
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
// Edit FAQ element
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

// Delete FAQ element
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

// Skills

// Skill toevoegen
if(isset($_POST['skill_new'])){

    $skill_name = $_POST['skill_naam'];

    $check_query = "SELECT * FROM skills where skills_name='$skill_name'";
    $check_query_run = mysqli_query($connection, $check_query);

    if (mysqli_num_rows($check_query_run) == 0){

        $query = "INSERT INTO skills (skills_name) VALUES ('$skill_name')";
        $query_run = mysqli_query($connection, $query);

        if($query_run){
            $_SESSION['succes'] = "Nieuwe Skill toegevoegd";
            header('Location: skills.php');
        }
        else{
            $_SESSION['status'] = "Nieuwe Skill niet toegevoegd";
            header('Location: skills.php');
        }
    }
    else{
        $_SESSION['status'] = "Skill bestaat al";
        header('Location: skills.php');
    }
}

// Skills registratie
if(isset($_POST['skill_registratie'])){

    $sql_skills = "SELECT * FROM skills";
    $sql_skills_run = mysqli_query($connection, $sql_skills);

    if(mysqli_num_rows($sql_skills_run) > 0){
        for ($i = 0; $i < mysqli_num_rows($sql_skills_run); $i++){
            $row = mysqli_fetch_assoc($sql_skills_run);
            $skill_naam = $row['skills_name'];
            $niveau_waarde = "niveau_veld".$i;
            $skill_niveau = $_POST[$niveau_waarde];
            $medewerker_name = $_POST['naam_veld'];

            // Medewerker ID ophalen
            $sql = "SELECT * FROM medewerker WHERE naam='$medewerker_name'";
            $sql_run = mysqli_query($connection, $sql);

            if(mysqli_num_rows($sql_run) > 0){
                while($row = mysqli_fetch_assoc($sql_run))
                {
                    $medewerker_ID = $row['medewerker_ID'];
                }
            }
            else{
                $_SESSION['status'] = "Geen medewerker genaamd " . $medewerker_name . " gevonden.";
                header('Location: skills.php');
            }

            $query = "INSERT INTO skills_med (medewerker_ID, naam, skill, niveau) VALUES ('$medewerker_ID','$medewerker_name','$skill_naam','$skill_niveau')";
            $query_run = mysqli_query($connection, $query);

            if($query_run){
                $_SESSION['succes'] = "Nieuwe Skill toegevoegd";
                header('Location: skills.php');
            }
            else{
                $_SESSION['status'] = "Nieuwe Skill niet toegevoegd";
                header('Location: skills.php');
            }
        }
    }

// Edit Skills

    //Medewerker_ID ophalen en bijhorende skills ophalen met values (for loop)
    if(isset($_POST['edit_skills'])){

    $medewerker_id = $_POST['edit_id']; 
    
    // $sql_med_skills = "SELECT * FROM skills_med where medewerker_ID='$medewerker_id'";
    // $sql_med_skills_run = mysqli_query($connection, $sql_med_skills);

    $query = "UPDATE skills_med SET  naam='$medewerker_name', skill='$skill_naam',  niveau='$skill_niveau' WHERE medewerker_ID=$id";
    $query_run = mysqli_query($connection, $query);

    if($query_run){
        $_SESSION['succes'] = "Skills aangepast";
        header('Location: skills.php');
    }
    else{
        $_SESSION['status'] = "Skills niet aangepast";
        header('Location: skills.php');

        }

    }

    // skills verwijderen.
    if(isset($_POST['skills_delete'])){

        $med_id = $_POST['delete_id']; 

        $query = "DELETE FROM skills_med WHERE medewerker_ID ='$med_id' ";
        $query_run = mysqli_query($connection, $query);
    
        if($query_run){
            $_SESSION['succes'] = "skills zijn verwijderd";
            header('Location: skills.php');
        }
        else{
            $_SESSION['status'] = "skills zijn niet verwijderd";
            header('Location: skills.php');
    
        }
    
    }
}





?>