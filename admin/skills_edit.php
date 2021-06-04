<?php

include('security.php');
include('geentoegang.php');
include('includes/header.php'); 
include('includes/navbar.php'); 

$medewerker_id = $_GET['id'];

function showNameId(){
  include('database/dbconfig.php');

  $medewerker_id = $_GET['id'];
  $get_skills = "SELECT * FROM skills_med where medewerker_ID='$medewerker_id'";
  $run_get_skills = mysqli_query($connection, $get_skills);

  if(mysqli_num_rows($run_get_skills) > 0){

      $row = mysqli_fetch_assoc($run_get_skills);
      $skills_id = $row['medewerker_ID'];
      $skills_naam = $row['naam'];

      echo "
      <p><b>Medewerker ID :</b> $skills_id</p>
      <p><b>Medewerker Naam :</b> $skills_naam</p>
      ";

      editSkills();
  }else {
          echo "
            <p><b>Geen registratie bekend bij deze medewerker</b></p>
          ";
        }
}

function editSkills(){
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
    echo '<button type="submit" name="save_skills" class="btn btn-primary"> Update </button>';
    }
    else{
            echo "No Record Found";
        }

  echo "";
}
?>

<!-- Skills weergeven -->
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Skills Edit</h6>
    </div>

    <div class="card-body">
        <form action="code.php?id=<?php echo $medewerker_id; ?>" method="POST">
          <div class="table-responsive">
              <?php
              if (isset($_POST['edit_skills'])){
                  showNameId();
              }
              ?>
              <a href="skills.php" class="btn btn-danger"> Cancel </a>
              <!-- <button type="submit" name="save_skills" class="btn btn-primary"> Update </button> -->
          </div>
        </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');

// if (isset($_POST['save_skills'])){
//   include('database/dbconfig.php');

//   //Medewerker ID
//   $medewerker_id = $_GET['id'];

//   //Loop met waardes van alle velden

//   $sql_skills = "SELECT * FROM skills";
//   $sql_skills_run = mysqli_query($connection, $sql_skills);

//   if(mysqli_num_rows($sql_skills_run) > 0){
//     for ($i = 0; $i < mysqli_num_rows($sql_skills_run); $i++){
//         $row = mysqli_fetch_assoc($sql_skills_run);
//         $skill_naam = $row['skills_name'];

//         // Niveau waarde uit form halen
//         $niveau_waarde = "niveau_veld".$i;
//         $skill_niveau = $_POST[$niveau_waarde];

//         $query = "UPDATE skills_med SET niveau='$skill_niveau' WHERE medewerker_ID='$medewerker_id' AND skill='$skill_naam'";
//         $query_run = mysqli_query($connection, $query);

//         if($query_run){
//             $_SESSION['succes'] = "Skills aangepast";
//             header('Location: skills.php');
//         }
//         else{
//             $_SESSION['status'] = "Skills niet aangepast";
//             header('Location: skills.php');
//         }
//     }
// }
// }
?>

 