<?php

include('security.php');
include('geentoegang.php');
include('includes/header.php'); 
include('includes/navbar.php'); 

if (isset($_POST['info_skills'])){
    showInfo();
}

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
    $get_skills = "SELECT * FROM skills_med where medewerker_ID='$medewerker_id'";
    $run_get_skills = mysqli_query($connection, $get_skills);
    if(mysqli_num_rows($run_get_skills) > 0){
        while($row = mysqli_fetch_assoc($run_get_skills)){
            $skills_naam = $row['naam'];
            $skills_skill = $row['skill'];
            $skills_niveau = $row['niveau'];
        }
        echo "
            <p><b>Medewerker Naam :</b> $skills_naam</p>
            <p><b>Skill :</b> $skills_skill</p>
            <p><b>Niveau :</b> $skills_niveau</p>
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
            <p><b>Medewerker ID :</b> hier komt medewerker id</p>
            <p><b>Medewerker Naam :</b> hier komt medewerker naam</p>
            <p><b>Medewerker Achternaam :</b> hier komt medewerker achternaam</p><br>

            <!-- For loop met skills en niveau. -->
            <p><b>Skillnaam :</b> skillniveau</p>

            <?php
            showInfo();
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

 