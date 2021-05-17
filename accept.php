<?php
    include('resources/functions.php');
    $id = $_GET['id'];
    $query = "select * from `sollicitatie` where `id` = '$id'; ";
    if(count(fetchAll($query)) > 0){
        foreach(fetchAll($query) as $row){
            $result = $row['stage_ID'];
            $result = $row['naam'];
            $result = $row['adres'];
            $result = $row['postcode'];
            $result = $row['telefoonnummer'];
            $result = $row['emailadres'];
            $query = "INSERT INTO `stageplek` (`id`, `username`,`email`, `user_type`, `password`) VALUES (NULL, '$username', '$email', '$user_type', '$password');";
        }
        $query .= "DELETE FROM `sollicitatie` WHERE `sollicitatie`.`id` = '$id';";
        if(performQuery($query)){
            echo "Account has been accepted.";
        }else{
            echo "Unknown error occured. Please try again.";
        }
    }else{
        echo "Error occured.";
    }
    
?>
<br/><br/>
<a href="accepting.php">Back</a>

