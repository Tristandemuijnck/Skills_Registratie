<?php

include('security.php');
include('geentoegang.php');
include('includes/header.php'); 
include('includes/navbar.php'); 

// Medewerkers printen
function showMedewerkers(){
    include('database/dbconfig.php');

    $sql = "SELECT * FROM medewerker";
    $sql_run = mysqli_query($connection, $sql);

    if(mysqli_num_rows($sql_run) > 0){
        while($row = mysqli_fetch_assoc($sql_run))
        {
            $volNaam = $row['naam'] . " " . $row['achternaam'];
            ?>

            <option value="<?php echo $row['naam'] ?>"><?php echo $volNaam ?></option>

            <?php
        }
    }
    else{
            echo "No Record Found";
        }
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

?>

<!-- Skills registratie modal -->
<div class="modal fade" id="addskillregistratie" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Skills registratie</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

          <div class="form-group">
            <label for="naam">Naam</label>
                <select name="naam_veld" id="naam_veld" class="form-control" required>
                    <option value="">Kies een werknemer</option>
                        <?php 
                            showMedewerkers();
                        ?>
                </select>
          </div>
          <?php 
            registerSkills();
          ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="skill_registratie" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>

<!-- Skill toevoegen modal -->
<div class="modal fade" id="addskill" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Skill toevoegen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Skill naam </label>
                <input type="text" name="skill_naam" class="form-control" placeholder="Voer nieuwe skill in" required> 
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="skill_new" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>

<!-- Skills weergeven -->
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Skills
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addskillregistratie" style="margin-left: 0.5em;">Skills registratie</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addskill" style="margin-left: 0.5em;">Skill toevoegen</button>
      </h6>
    </div>

    <div class="card-body">

        <?php
  
            if(isset($_SESSION['succes']) && $_SESSION['succes'] !='')
            {
                echo '<h2 class="bg-primary text-white">' . $_SESSION['succes'] . '</h2>' ;
                unset($_SESSION['succes']);

            }

            if(isset($_SESSION['status']) && $_SESSION['status'] !='')
            {
                echo '<h2 class="bg-danger text-white">' . $_SESSION['status'] . '</h2>' ;
                unset($_SESSION['status']);

            }
        ?>
    <div class="table-responsive">

    <?php

    $query = "SELECT * FROM medewerker ORDER BY medewerker_ID ASC";
    $query_run = mysqli_query($connection, $query);

    ?>
        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th> ID </th>
              <!-- <th> Gebruikersnaam</th> -->
              <th> Naam</th>
              <th> Achternaam</th>
              <th> Meer Info</th>
              <th> Edit </th>
              <th> Delete </th>
            </tr>
          </thead>
          <tbody>

            <?php

          if(mysqli_num_rows($query_run) > 0)
          {
            while($row = mysqli_fetch_assoc($query_run))
            {
              ?>

            <tr>
              <td> <?php echo $row['medewerker_ID']; ?> </td>
              <td> <?php echo $row['naam']; ?> </td>
              <td> <?php echo $row['achternaam']; ?> </td>
              <td>
                <form action="skills_info.php?id=<?php echo $row['medewerker_ID']; ?>" method="post">
                  <input type="hidden" name="info_id" value="<?php echo $row['medewerker_ID']; ?>">
                  <button type="submit" name="info_skills" class="btn btn-success"> Meer info</button>
                </form>
              </td>
              <td>
                <form action="skills_edit.php" method="post">
                  <input type="hidden" name="edit_id" value="<?php echo $row['medewerker_ID']; ?>">
                  <button type="submit" name="edit_skills" class="btn btn-success"> Edit</button>
                </form>
              </td>
              <td>
                <form action="code.php" method="post">
                  <input type="hidden" name="delete_id" value=" <?php echo $row['medewerker_ID']; ?> ">
                  <button type="submit" name="skills_delete" class="btn btn-danger"> Delete</button>
                </form>
              </td>
            </tr>

            <?php
            }
          }
          else{
            echo "No Record Found";
          }

          ?>

          </tbody>
        </table>

      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid. -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>