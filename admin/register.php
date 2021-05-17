<?php

include('security.php');
include('geentoegang.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
include('../resources/utilities.php');

?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Naam </label>
                <input type="text" name="naam" class="form-control" placeholder="Enter Naam">
            </div>
            <div class="form-group">
                <label> Achternaam </label>
                <input type="text" name="achternaam" class="form-control" placeholder="Enter Achternaam">
            </div>
            <div class="form-group">
                <label> Email </label>
                <input type="email" name="emailadres" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Wachtwoord</label>
                <input type="password" name="wachtwoord" class="form-control" placeholder="Enter Wachtwoord">
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
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Admin Profile 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Admin Profile 
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

    $query = "SELECT * FROM admin";
    $query_run = mysqli_query($connection, $query);



    ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Naam </th>
            <th> Achternaam </th>
            <th> Emailadres</th>
            <th> Datum Toegevoegd</th>
            <th> EDIT </th>
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
            <td> <?php echo $row['admin_ID']; ?> </td>
            <td> <?php echo $row['naam']; ?> </td>
            <td> <?php echo $row['achternaam']; ?> </td>
            <td> <?php echo $row['emailadres']; ?> </td>
            <td> <?php echo $row['date']; ?> </td>
            <td>
                <form action="register_edit.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['admin_ID']; ?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>
                <form action="code.php" method="post">
                  <input type="hidden" name="delete_id" value=" <?php echo $row['admin_ID']; ?> ">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
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