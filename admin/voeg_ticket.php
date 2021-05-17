<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> Ticketing
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Edit Ticket
            </button>
    </h6>
  </div>

<div class="card-body">

    <?php

    // $connection = mysqli_connect("localhost","root","","adminpanel");

    if(isset($_POST['edit_btn']))
    {
        $id = $_POST['edit_id'];
    
        $query = "SELECT * FROM ticket WHERE ticket_ID='$id' ";
        $query_run = mysqli_query($connection, $query);

        foreach($query_run as $row)
    {
        ?>

    <form action="code.php" method="POST">  
        
    
        <input type="hidden" name="edit_ticket_ID" value="<?php echo $row['ticket_ID'] ?> ">
        <div class="form-group">
            <label> User ID </label>
            <input type="text" name="edit_user_ID" value="<?php echo $row['user_ID'] ?>" class="form-control" placeholder="Enter Naam">
        </div>
        <div class="form-group">
            <label> Melder ID </label>
            <input type="text" name="edit_melder_ID" value="<?php echo $row['melder_ID'] ?>" class="form-control" placeholder="Enter Achternaam">
        </div>
        <div class="form-group">
            <label> Chat ID </label>
            <input type="text" name="edit_chat_ID" value="<?php echo $row['chat_ID'] ?>" class="form-control" placeholder="Enter Achternaam">
        </div>
        <div class="form-group">
            <label> Categorie </label>
            <input type="text" name="edit_categorie" value="<?php echo $row['categorie'] ?>" class="form-control" placeholder="Enter Achternaam">
        </div>
        <div class="form-group">
            <label> Prioriteit </label>
            <input type="text" name="edit_prioriteit" value="<?php echo $row['prioriteit'] ?>" class="form-control" placeholder="Enter Achternaam">
        </div>
        <div class="form-group">
            <label> Uitleg </label>
            <input type="text" name="edit_uitleg" value="<?php echo $row['uitleg'] ?>" class="form-control" placeholder="Enter Achternaam">
        </div>
            <a href="verzamel_ticket.php" class="btn btn-danger"> Cancel </a>
            <button type="submit" name="edit_ticket_btn" class="btn btn-primary"> Update </button>
    </form>
        
        <?php
        }
        } 
        ?>

    </div>
</div>
</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>




