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
        <h5 class="modal-title" id="exampleModalLabel">Voeg Ticket Data toe</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> User_ID </label>
                <input type="text" name="user_ID" class="form-control" placeholder="Enter User ID">
            </div>
            <div class="form-group">
                <label> Melder_ID </label>
                <input type="text" name="melder_ID" class="form-control" placeholder="Enter Melder ID">
            </div>
            <div class="form-group">
                <label> Chat_ID (optioneel)</label>
                <input type="text" name="chat_ID" class="form-control" placeholder="Enter Chat ID">
            </div>
            <div class="form-group">
                <label>Prioriteit</label>
                <input type="text" name="prioriteit" class="form-control" placeholder="Enter Prioriteit">
            </div>
            <div class="form-group">
                <label>Categorie</label>
                <input type="text" name="categorie" class="form-control" placeholder="Enter Categorie">
            </div>
            <div class="form-group">
                <label>Uitleg</label>
                <input type="text" name="uitleg" class="form-control" placeholder="Confirm Uitleg">
            </div>

            <input type="hidden" name="token" value="<?php $token = _token();
                                    $token = $_SESSION['token']; echo $token;  ?>">
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="add_ticket_btn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Ticketing 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add ticket 
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

    $query = "SELECT * FROM ticket";
    $query_run = mysqli_query($connection, $query);



    ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> Ticket ID </th>
            <th> User ID </th>
            <th> Melder ID </th>
            <th> Chat ID </th>
            <th> Prioriteit</th>
            <th> Categorie</th>
            <th> Uitleg</th>
            <th> Datum</th>            
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
            <td> <?php echo $row['ticket_ID']; ?> </td>
            <td> <?php echo $row['user_ID']; ?> </td>
            <td> <?php echo $row['melder_ID']; ?> </td>
            <td> <?php echo $row['chat_ID']; ?> </td>
            <td> <?php echo $row['prioriteit']; ?> </td>
            <td> <?php echo $row['categorie']; ?> </td>
            <td> <?php echo $row['uitleg']; ?> </td>
            <td> <?php echo $row['datum']; ?> </td>


            <td>
                <form action="voeg_ticket.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['ticket_ID']; ?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>
                <form action="code.php" method="post">
                  <input type="hidden" name="delete_id" value=" <?php echo $row['ticket_ID']; ?> ">
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