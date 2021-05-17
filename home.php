                                                                                                                                                                                                                    
<?php
include_once 'partials/header.php';
?>




<div style="background-color: #F0F0F0;" class="container py-5">
    <div class="row py-3">
        <div class="col-md-8">
            <div class="card">
                <img src="images/ict-beheerder.jpg"  class="card-img-top" alt="...">
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
           
                <input type="hidden" value="<?php echo $row['id'] ?>">          
                <h5 class="card-title"> <?php echo $row['title']; ?></h5>
                <h6> <?php echo $row['subtitle']; ?></h6>
                <p class="card-text"> <?php echo $row['description']; ?></p>
                <a href="<?php echo $row['links']; ?>" class="btn btn-primary" style="background-color:red">Meer informatie</a>
                
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
                <img src="images/ict-beheerder.jpg" class="card-img-top" alt="...">
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
                <h5 class="card-title"> <?php echo $row['title']; ?></h5>
                <h6> <?php echo $row['subtitle']; ?></h6>
                <p class="card-text"> <?php echo $row['description']; ?></p>
                <a href="<?php echo $row['links']; ?>" class="btn btn-primary" style="background-color:red">Meer informatie</a>
                
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

        
        
        <div class="col-md-4">
            <div class="card">
            <img src="images/cybersecurity.jpg" class="card-img-top" alt="...">
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

                <h5 class="card-title"> <?php echo $row['title']; ?></h5>
                <h6> <?php echo $row['subtitle']; ?></h6>
                <p class="card-text"> <?php echo $row['description']; ?></p>
                <a href="<?php echo $row['links']; ?>" class="btn btn-primary" style="background-color:red">Meer informatie</a>
                
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
            <img src="images/app_ontwikkeling.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <?php

                    include('admin/database/dbconfig.php');

                    $query = "SELECT * FROM abouts WHERE id='7' ";
                    $query_run = mysqli_query($connection, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        foreach($query_run as $row)
                        {
                            ?>

                <h5 class="card-title"> <?php echo $row['title']; ?></h5>
                <h6> <?php echo $row['subtitle']; ?></h6>
                <p class="card-text"> <?php echo $row['description']; ?></p>
                <a href="#" class="btn btn-primary" style="background-color:red">Meer informatie</a>
                
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
    </div>
</div>
 
<hr>
<div class="container py-5">
    <div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col">
        <div class="card h-100">
        <img src="images/development.png" width="" class="card-img-top" alt="">
        <div class="card-body">
            <h5 class="card-title">Wat is de It-winkel?</h5>
            <p class="card-text">ROC IT winkel is een nieuw initiatief van het ROC van Amsterdam op locatie Hilversum.
            Door het inzetten van leerlingen in hybride lesvorm dan wel stage zullen de geleverde diensten van de ROC IT winkel lager uitvallen dan diensten die geleverd worden door commerciële bedrijven.
            </p>
        </div>
        <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
        </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
        <img src="images/rockitlogo.png" style="padding: 10px;" class="card-img-top" alt="">
        <div class="card-body">
            <h5 class="card-title">Wie zijn wij?</h5>
            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
        </div>
        <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
        </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
        <img src="images/codeimage.png" class="card-img-top" alt="">
        <div class="card-body">
            <h5 class="card-title">Wat doen wij?</h5>
            <p class="card-text"> De doelstelling van de ROC IT winkel is het in de breedste zin het bieden van ICT diensten:
            <li>Leerlingen van het ROC kunnen oefenen met praktijksituaties.</li>
            <li>Leerlingen worden ondersteund door vakdocenten en praktijkbegeleiders. </li>
            <li>Continuïteit en kwaliteit worden gegarandeerd door vakdocenten en praktijkbegeleiders </li> </p>
        </div>
        <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
        </div>
        </div>
    </div>
    </div>
</div>


<?php _token(); ?>

<?php 
include_once 'admin/includes/scripts.php';
include_once 'partials/parseFooter.php'; 
?>