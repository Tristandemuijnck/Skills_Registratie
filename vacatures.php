                                                                                                                                                                                                                    
<?php
include('admin/database/dbconfig.php');
include_once 'partials/header.php';



?>

<div id="banner">
  <img alt="my banner" style="width:100%;" src="images/banner2.jpg">
</div>


<div class="container py-2">
    <div class="row py-5">
        <div class="col-md-4">
            <div class="card hover-shadow">
                <img
                    src="images/ictbeheerder.jpg"
                    class="card-img-top"
                    alt="..."
                />

                <?php
                $query = "SELECT * FROM vacature WHERE id='4' ";
                    $query_run = mysqli_query($connection, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        foreach($query_run as $row)
                        {
                            ?>

            <div class="card-body">
                <h5 class="card-title"> <?php echo $row['title'] ?> </h5>
                <p class="card-text"> <?php echo $row['subtitle'] ?> </p>
                <p class="card-description"> <?php echo $row['description'] ?> </p>
                <a href="sollicitatie.php" class="btn btn-primary ">Solliciteren</a>
            </div>

                            <!-- php script continious -->
                <?php
                        }
                    }
                    else
                    {
                        echo "No data found";
                    }
                ?>
            </div>
        </div>

            <br>
            <br>
            <div class="col-md-4">
            <div class="card hover-shadow">
                <img
                    src="images/cybersecurity.jpg"
                    class="card-img-top"
                    alt="..."
                />
                <?php
                $query = "SELECT * FROM vacature WHERE id='6' ";
                    $query_run = mysqli_query($connection, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        foreach($query_run as $row)
                        {
                            ?>

            <div class="card-body">
                <h5 class="card-title"> <?php echo $row['title'] ?> </h5>
                <p class="card-text"> <?php echo $row['subtitle'] ?> </p>
                <p class="card-description"> <?php echo $row['description'] ?> </p>
                <a href="sollicitatie.php" class="btn btn-primary">Solliciteren</a>
            </div>

                            <!-- php script continious -->
                <?php
                        }
                    }
                    else
                    {
                        echo "No data found";
                    }
                ?>
            
            </div>
        </div>

            
        
        
        <div class="col-md-4">
            <div class="card hover-shadow">
                <img
                    src="images/Software developer.jpg " style="height: 20%"
                    class="card-img-top"
                    alt="..."
                />
                <?php
                $query = "SELECT * FROM vacature WHERE id='12' ";
                    $query_run = mysqli_query($connection, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        foreach($query_run as $row)
                        {
                            ?>

            <div class="card-body">
                <h5 class="card-title"> <?php echo $row['title'] ?> </h5>
                <p class="card-text"> <?php echo $row['subtitle'] ?> </p>
                <p class="card-description"> <?php echo $row['description'] ?> </p>
                <a href="sollicitatie.php" class="btn btn-primary">Solliciteren</a>
            </div>

                            <!-- php script continious -->
                <?php
                        }
                    }
                    else
                    {
                        echo "No data found";
                    }
                ?>

            </div>
            <br>
        </div>
            
             <?php
            $query = "SELECT * FROM bd_vacature WHERE status='geaccepteerd' ";
            $query_run = mysqli_query($connection, $query);

            if(mysqli_num_rows($query_run) > 0)
                {
                foreach($query_run as $row)
                {
                    ?>
        <div class="col-md-4">
                

            <div class="card hover-shadow">
                <img
                    src="images/ictbeheerder.jpg"
                    class="card-img-top"
                    alt="..."
                />

            
            <div class="card-body">
                <h5 class="card-title"> Bedrijfsnaam:  <?php echo $row['bedrijfsnaam'] ?> </h5>
                <p class="card-title"> Vacature: <?php echo $row['vacature'] ?> </p>
                <p class="card-title"> Stageplek: <?php echo $row['stageplek'] ?> </p>
                <p class="card-title"> Startdatum: <?php echo $row['startdatum'] ?> </p>
                <p class="card-title"> Omschrijving: <?php echo $row['omschrijving'] ?> </p>
                <p class="card-title"> Functieomschrijving: <?php echo $row['functieomschrijving'] ?> </p>

                <a href="sollicitatie.php" class="btn btn-primary ">Solliciteren</a>
            </div>

                            <!-- php script continious -->
                
            </div>
            <br>
        </div>
        <?php
                        }
                    }
                    else
                    {
                       
                    }
                ?>
                                                                                                                                                                                                                    
            </div>  
        </div>
    </div>
</div>



<?php


if(isset($_POST['solliciteer'])){
  if(!$_SESSION['user_ID']){
      $_SESSION['status'] = "U bent niet ingelogd";
      header('Location: login.php');

  }
  else{
      $_SESSION['status'] ="ingelogd";
      header('Location: vacatures.php');

  }
}
?>


<?php _token(); ?>

<?php 
// include_once 'admin/includes/scripts.php';
include_once 'partials/parseFooter.php'; 
?>