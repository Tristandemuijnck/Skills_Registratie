<?php

include('security.php');
include('geentoegang.php');
include('includes/header.php'); 
include('includes/navbar.php'); 

// Skills printen
function showSkills(){
    include('database/dbconfig.php');

    $sql = "SELECT * FROM skills";
    $sql_run = mysqli_query($connection, $sql);

    if(mysqli_num_rows($sql_run) > 0){
        while($row = mysqli_fetch_assoc($sql_run))
        {
            $skillNaam = $row['skills_name'];
            ?>

            <option value="<?php echo $skillNaam ?>"><?php echo $skillNaam ?></option>

            <?php
        }
    }
    else{
            echo "No Record Found";
        }
}

function registerSkills(){
  include('database/dbconfig.php');

    $sql = "SELECT * FROM skills";
    $sql_run = mysqli_query($connection, $sql);

    if(mysqli_num_rows($sql_run) > 0){
    for ($i = 0; $i < mysqli_num_rows($sql_run); $i++) {
      $row = mysqli_fetch_assoc($sql_run);
      $skillNaam = $row['skills_name'];
      echo '
          <div class="form-group">
              <label>' . $skillNaam . '</label>
              <input type="hidden" name="'. $skillNaam .'" class="form-control" placeholder="" required> 
                  <select name="niveau_veld'. $i .'" id="niveau_veld" class="form-control" required>
                      <option value="">Kies een niveau</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>  
                  </select>
            </div>
          ';
    }
    }
    else{
            echo "No Record Found";
        }

  echo "";
}

function showInfo(){
    include('database/dbconfig.php');

    $medewerker_id = $_GET['id'];
    $get_skills = "SELECT * FROM skills_med where medewerker_ID='$medewerker_id' ORDER BY niveau DESC";
    $run_get_skills = mysqli_query($connection, $get_skills);

    if(mysqli_num_rows($run_get_skills) > 0){

        $row = mysqli_fetch_assoc($run_get_skills);
        $skills_id = $row['medewerker_ID'];
        $skills_naam = $row['naam'];

        echo "
        <h5><b>Medewerker ID :</b> $skills_id</h5>
        <h5><b>Medewerker Naam :</b> $skills_naam</h5><br>
        ";

        foreach($run_get_skills as $row){
            $skills_skill = $row['skill'];
            $skills_niveau = $row['niveau'];

            switch ($skills_niveau){
                case "1":
                    echo '
                        <h3><b>'.$skills_skill.'</b>
                        <div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="'.$skills_niveau.'" aria-valuemin="0" aria-valuemax="5">'.$skills_niveau.'</div>
                        </div>
                        </h3><br>
                    ';
                    break;

                case "2":
                    echo '
                        <h3><b>'.$skills_skill.'</b>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="'.$skills_niveau.'" aria-valuemin="0" aria-valuemax="5">'.$skills_niveau.'</div>
                        </div>
                        </h3><br>
                    ';
                    break;
                
                case "3":
                    echo '
                        <h3><b>'.$skills_skill.'</b>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="'.$skills_niveau.'" aria-valuemin="0" aria-valuemax="5">'.$skills_niveau.'</div>
                        </div>
                        </h3><br>
                    ';
                    break;

                case "4":
                    echo '
                        <h3><b>'.$skills_skill.'</b>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 80%" aria-valuenow="'.$skills_niveau.'" aria-valuemin="0" aria-valuemax="5">'.$skills_niveau.'</div>
                        </div>
                        </h3><br>
                    ';
                    break;

                case "5":
                    echo '
                        <h3><b>'.$skills_skill.'</b>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="'.$skills_niveau.'" aria-valuemin="0" aria-valuemax="5">'.$skills_niveau.'</div>
                        </div>
                        </h3><br>
                    ';
                    break;

                default:
                    echo 'Geen waarde beschikbaar';
            }

            // Print als er geen switch is
            
            // echo '
            // <p><b>Skill :</b> '.$skills_skill.'
            // <div class="progress">
            //     <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="'.$skills_niveau.'" aria-valuemin="0" aria-valuemax="5">'.$skills_niveau.'</div>
            // </div>
            // <b>Niveau :</b> '.$skills_niveau.'</p>
            // ';
        }
        
    }
    else{
        echo "
        <p><b>Geen skill registratie bekend bij deze medewerker.</b></p>
        ";
    }
}

?>

<!-- Skills weergeven -->
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Skills info</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <?php
            if (isset($_POST['info_skills'])){
                showInfo();
            }
            ?>
        </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>

 