<?php

include_once 'resources/utilities.php';
// // connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'it_winkel');
$sql = "SELECT * FROM sollicitatie";
$result = mysqli_query($conn, $sql);
$files = mysqli_fetch_all($result, MYSQLI_ASSOC);
// $id = $_SESSION['user_ID'];




// Uploads files
if (isset($_POST['signupBtn'])) { // if save button on the form is clicked
    $vacature = $_POST['vacature'];
    $id = $_SESSION['user_ID'];
    
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];
    $filename1 = $_FILES['myfile1']['name'];

    // destination of the file on the server
    $destination = 'uploads/' . $filename;
    $destination1 = 'uploads/' . $filename1;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $extension1 = pathinfo($filename1, PATHINFO_EXTENSION);


    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];
    $file1 = $_FILES['myfile1']['tmp_name'];
    // $size1 = $_FILES['myfile1']['size1'];



    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } elseif ($_FILES['myfile1']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
            echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        
        if (move_uploaded_file($file, $destination)) {
            if (checkDuplicateEntries("sollicitatie", "user_ID", $id, $db)) {
                echo "<script type=\"text/javascript\">
                Swal.fire({
                    title: 'U heeft al een sollicitatie verstuurd',
                    icon: 'error',
                    showConfirmButton: false,
                })
                setTimeout(function(){
                    window.location.href = 'sollicitatie.php';
                }, 3000);
                </script>";
            }else{
                $sql = "INSERT INTO sollicitatie (user_ID,vacature,cv,motivatiebrief) VALUES ('$id','$vacature','$filename','$filename1')";
                if (mysqli_query($conn, $sql)) {
                    echo "<script type=\"text/javascript\">
                    Swal.fire({
                        title: 'Sollicitatie is met succes verstuurd!',
                        icon: 'success',
                        showConfirmButton: false,
                    })
                    setTimeout(function(){
                        window.location.href = 'home.php';
                    }, 3000);
                    </script>";
                } 
                else {
                    echo "<script type=\"text/javascript\">
                Swal.fire({
                    title: 'Er is een fout opgetreden, neem contact op.',
                    icon: 'error',
                    showConfirmButton: false,
                })
                setTimeout(function(){
                    window.location.href = 'sollicitatie.php';
                }, 3000);
                </script>";
                }
            } 
            }
            
    }


// if (!in_array($extension1, ['zip', 'pdf', 'docx'])) {
//     echo "You file extension must be .zip, .pdf or .docx";
// } elseif ($_FILES['myfile1']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
//     echo "File too large!";
// } else {
//     // move the uploaded (temporary) file to the specified destination
//     if (move_uploaded_file($file1, $destination1)) {
//         $sql = "INSERT INTO sollicitatie (user_ID,vacature,name, size, downloads) VALUES ('$id','$vacature','$filename1', $size1, 0)";
//         if (mysqli_query($conn, $sql)) {
//             echo '<script>alert("Sollicitate verstuurd")</script>';
//         }
//     } else {
//         echo '<script>alert("Er is een fout opgetreden bij het versturen van uw sollicitatie, probeer het later nog.")</script>';
//     }
//  }
}











// Downloads files
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    // $sql = "SELECT * FROM sollicitatie WHERE user_ID=$id";

    // $sql = "SELECT * FROM sollicitatie";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['cv'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['cv']));
        readfile('uploads/' . $file['cv']);

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE sollicitatie SET downloads=$newCount WHERE user_ID=$id";
        mysqli_query($conn, $updateQuery);
        exit;
    }

}