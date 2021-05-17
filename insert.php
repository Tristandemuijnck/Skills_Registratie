<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<?php
if (isset($_POST['signupBtn'])) {

$id = $_SESSION['user_ID']; 
$bedrijfsnaam = $_POST['bedrijfsnaam'];
$omschrijving = $_POST['omschrijving'];
$vacature = $_POST['vacature'];
$functieomschrijving = $_POST['functieomschrijving'];
$stage = $_POST['stage'];
$stagebegin = $_POST['stagebegin'];


// verder afmaken vacature inserten voor bedrijven 
try {
        if (checkDuplicateEntries("bd_vacature", "user_ID", $id, $db)) {
            echo "<script type=\"text/javascript\">
            Swal.fire({
                title: 'U heeft al een vacature opgestuurd!',
                icon: 'error',
                showConfirmButton: false,
            })
            setTimeout(function(){
                window.location.href = 'bd_vacatures.php';
            }, 3000);
            </script>";
        }else{

            $query = "INSERT INTO bd_vacature (bedrijfsnaam,omschrijving,vacature,functieomschrijving,stageplek,startdatum) VALUES 
            ('$bedrijfsnaam','$omschrijving','$vacature','$functieomschrijving','$stage','$stagebegin')";
            $statement = $db->prepare($query);
            $statement->execute();

            if ($statement) {
                echo "<script type=\"text/javascript\">
                Swal.fire({
                    title: 'Vacature is opgestuurd!',
                    icon: 'success',
                    showConfirmButton: false,
                })
                setTimeout(function(){
                    window.location.href = 'home.php';
                }, 3000);
                </script>";
            }
        }
    
} catch (PDOException $ex) {
    echo "<script type=\"text/javascript\">
    Swal.fire({
        title: 'Er is een onverwachte fout opgetreden, neem contact op!',
        icon: 'error',
        showConfirmButton: false,
    })
    setTimeout(function(){
        window.location.href = 'bd_vacatures.php';
    }, 3000);
    </script>";
}
}