                                                                                                                                                                                                                    
<?php
include_once 'partials/header.php';
?>


<br>

<div style="background-color: #F0F0F0;" class="container py-5">
    <div class="row py-3">
        <div class="col-md-8">
            <div class="card">
                <img src="images/bedrijf1.jpg"  class="card-img-top" alt="...">
            <div class="card-body">

                <?php
                    include('admin/database/dbconfig.php');

                    $query = "SELECT * FROM abouts WHERE id='4' ";
                    $query_run = mysqli_query($connection, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        foreach($query_run as $row)
                        {
                            ?>
           
                <!-- <input type="hidden" value="<?php echo $row['id'] ?>">          
                <h5 class="card-title"> <?php echo $row['title']; ?></h5>
                <h6> <?php echo $row['subtitle']; ?></h6>
                <p class="card-text"> <?php echo $row['description']; ?></p>
                <a href="<?php echo $row['links']; ?>" class="btn btn-primary" style="background-color:red">Meer informatie</a> -->
                
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

       

            <div class="card">
                <!-- <img src="images/ict-beheerder.jpg" class="card-img-top" alt="..."> -->
            <div class="card-body">

                <?php
                    include('admin/database/dbconfig.php');

                    $query = "SELECT * FROM abouts WHERE id='8' ";
                    $query_run = mysqli_query($connection, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        foreach($query_run as $row)
                        {
                            ?>
           
                <input type="hidden" value="<?php echo $row['id'] ?>">          
                <h5 class="card-title"> INFO</h5>
                <h6> <?php echo $row['subtitle']; ?></h6>
                <h7><p class="card-text"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis molestias. 
                    Fugiat pariatur maxime quis culpa corporis vitae repudiandae aliquam voluptatem veniam,
                     est atque cumque eum delectus sint! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis molestias. 
                    Fugiat pariatur maxime quis culpa maxime quis culpa 
                  <h7>
                <br>
                
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
        </div>

        <!-- als RR.png niet goed is gebruik bedrijf2.jpg -->
        
        <div class="col-md-4">
            <div class="card">
            <img src="images/RR.png"  class="card-img-top" alt="..."> 
                <div class="card-body">
                <?php

                    include('admin/database/dbconfig.php');

                    $query = "SELECT * FROM abouts WHERE id='6' ";
                    $query_run = mysqli_query($connection, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        foreach($query_run as $row)
                        {
                            ?>

                <h5 class="card-title"> Info</h5>
                
                <p class="card-text"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis molestias. 
                    Fugiat pariatur maxime quis culpa corporis vitae repudiandae aliquam voluptatem veniam,
                     est atque cumque eum delectus sint! </p>
                <a href="bd_vacatures.php" class="btn btn-primary" style="background-color:red">Registreren</a>
                
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

            <div class="card">

            </div>
        </div>    
    </div>
</div>
 
<hr>


<?php _token(); ?>

<?php 
include_once 'admin/includes/scripts.php';
include_once 'partials/parseFooter.php'; 
?>