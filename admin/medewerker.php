<?php

include('security.php');
include('geentoegang.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
include('../resources/utilities.php');

?>


<div class="modal fade" id="addmedewerkerprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Medewerker Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">
                    <div class="form-group">
                        <label> Naam </label>
                        <input type="text" name="naam" class="form-control" placeholder="Naam">
                    </div>
                    <div class="form-group">
                        <label> Tussenvoegsel </label>
                        <input type="text" name="tussenvoegsel" class="form-control" placeholder="Tussenvoegsel">
                    </div>
                    <div class="form-group">
                        <label> Achternaam </label>
                        <input type="text" name="achternaam" class="form-control" placeholder="Achternaam">
                    </div>
                    <div class="form-group">
                        <label> Email </label>
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>   
                    <div class="form-group">
                        <label>Wachtwoord</label>
                        <input type="password" name="wachtwoord" class="form-control" placeholder="Confirm Wachtwoord">
                    </div>
                    <div class="form-group">
                        <label>Confirm Wachtwoord</label>
                        <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Wachtwoord">
                    </div>

            <input type="hidden" name="token" value="<?php $token = _token();
                                    $token = $_SESSION['token']; echo $token;  ?>">
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="addmedewerkerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Medewerker Profiel
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addmedewerkerprofile">
              Add Medewerker
            </button>
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

    // $connection = mysqli_connect("localhost","root","","adminpanel");

    $query = "SELECT * FROM medewerker";
    $query_run = mysqli_query($connection, $query);



    ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Naam </th>
            <th> Tussemvoegsel </th>
            <th> Achternaam </th>
            <th> Emailadres</th>
            <th> DELETE </th>
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
            <td> <?php echo $row['tussenvoegsel']; ?> </td>
            <td> <?php echo $row['achternaam']; ?> </td>
            <td> <?php echo $row['email']; ?> </td> 
            <td>
                <form action="code.php" method="post">
                  <input type="hidden" name="delete_id" value=" <?php echo $row['medewerker_ID']; ?> ">
                  <button type="submit" name="delete_medewerker_btn" class="btn btn-danger"> DELETE</button>
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
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>