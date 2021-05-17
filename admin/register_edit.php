<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> EDIT Admin Profile 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Admin Profile 
            </button>
    </h6>
  </div>

<div class="card-body">

    <?php

    // $connection = mysqli_connect("localhost","root","","adminpanel");

    if(isset($_POST['edit_btn']))
    {
        $id = $_POST['edit_id'];
    
        $query = "SELECT * FROM admin WHERE admin_ID='$id' ";
        $query_run = mysqli_query($connection, $query);

        foreach($query_run as $row)
    {
        ?>

    <form action="code.php" method="POST">  
        
    
        <input type="hidden" name="edit_id" value="<?php echo $row['admin_ID'] ?> ">
        <div class="form-group">
            <label> Username </label>
            <input type="text" name="edit_naam" value="<?php echo $row['naam'] ?>" class="form-control" placeholder="Enter Naam">
        </div>
        <div class="form-group">
            <label> Achternaam </label>
            <input type="text" name="edit_achternaam" value="<?php echo $row['achternaam'] ?>" class="form-control" placeholder="Enter Achternaam">
        </div>
        <div class="form-group">
            <label> Email </label>
            <input type="email" name="edit_email" value="<?php echo $row['emailadres'] ?>" class="form-control" placeholder="Enter Email">
        </div>
            <a href="register.php" class="btn btn-danger"> Cancel </a>
            <button type="submit" name="update_admin_btn" class="btn btn-primary"> Update </button>
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




