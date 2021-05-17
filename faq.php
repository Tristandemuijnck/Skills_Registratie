                                                                                                                                                                                                                    
<?php
include_once 'partials/header.php';
?>

<link rel="stylesheet" href="faq.css">

<div class="row py-3 faq-heading-row">
    <div class="col-md-12">
        <div class="jumbotron">
            <h1 class="display-3 faq-h1">Veelgestelde vragen</h1>
        </div>    
    </div>                                                                                                                                                                                                           
</div>


<div style="background-color: #F0F0F0;" class="container py-5">

    <div class="row py-3">
        <div class="col-md-12">
            <?php   

                include('admin/database/dbconfig.php');

                $query = "SELECT * FROM faq";
                $query_run = mysqli_query($connection, $query);
                $count_rows = mysqli_num_rows($query_run);   
                
                if($count_rows == 0){
                    echo "
                        <div class='card'>
                            <div class='card-body'>
                                <h5 class='card-title'><strong>Er is geen vraag beschikbaar</strong></h5>            
                            </div>
                        </div>
                        <br>
                    ";
                }
            
                while ($row_pro = mysqli_fetch_array($query_run)){
                    $question_id = $row_pro['id'];
                    $question_categoryid = $row_pro['categoryid'];
                    $question = $row_pro['question']; 
                    $answer= $row_pro['answer'];

                    
                    echo "
                        <div class='card'>
                        <div class='card-body'>

                        <input type='hidden' value='$question_id'>          
                        <h5 class='card-title' value='$question'><strong>$question</strong></h5>
                        <h6 value='$answer'>$answer</h6>

                        </div>
                        </div>
                        <br>
                    ";
                }
            
            ?>

        <br>
        <br>
  </div>
 </div>
</div>

<?php _token(); ?>

<?php 
include_once 'admin/includes/scripts.php';
include_once 'partials/parseFooter.php'; 
?>