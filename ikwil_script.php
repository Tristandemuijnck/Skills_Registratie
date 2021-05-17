<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<?php

include_once 'admin/database/dbconfig.php';


if(isset($_POST['ikwilBtn'])){

    $naam = $_POST['naam'];
    $email = $_POST['email'];
    $optie = $_POST['form_select'];
    $beschrijving = $_POST['textarea'];

    $form_errors = array();

    //form validations
    $required_fields = array('textarea');

    // call the function to check empty fields

    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

    //call the function to check minimum req length n merge the return data


    if($_POST['form_select'] == ''){
        echo "<script type=\"text/javascript\">
      
                Swal.fire({
                    title: 'Kies een optie!',
                    icon: 'error',
                    showConfirmButton: false
                })
                setTimeout(function(){
                    window.location.href = 'ikwil.php';
                }, 3000);
                </script>";
    } else {
        $query = "INSERT INTO ikwil (naam, email, beschrijving, optie) VALUES ('$naam', '$email', '$beschrijving', '$optie')";
        $query_run = mysqli_query($connection, $query);

        if($query_run){

            if($_POST['form_select'] == 'suggestie'){              
            // header('Location: home.php');
            echo "<script type=\"text/javascript\">
                Swal.fire({
                    title: 'Suggestie is verstuurd!',
                    icon: 'success',
                    showConfirmButton: false,
                })
                setTimeout(function(){
                    window.location.href = 'home.php';
                }, 3000);
                </script>";
            
            }
            else {
                // header('Location: home.php');
                echo "<script type=\"text/javascript\">
                Swal.fire({
                    title: 'Vraag is verstuurd!',
                    icon: 'success',
                    showConfirmButton: false, 
                })
                setTimeout(function(){
                    window.location.href = 'home.php';
                }, 3000);
                </script>";
            }
        
        }
        else{
            echo "<script type=\"text/javascript\">
                Swal.fire({
                    title: 'Er is iets fout gegaan, probeer opnieuw.',
                    icon: 'error',
                    showConfirmButton: false,
                })
                setTimeout(function(){
                    window.location.href = 'ikwil.php';
                }, 2500);
                </script>";         
        }
    }

    }

    



?>