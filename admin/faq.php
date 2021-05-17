<?php

include('security.php');
include('geentoegang.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Faq</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

          <div class="form-group">
            <label> Vraag </label>
            <input type="text" name="vraag" class="form-control" placeholder="Voer vraag in" required> 
          </div>
          <div class="form-group">
            <label>Antwoord</label>
            <input type="text" name="antwoord" class="form-control" placeholder="Voer antwoord in" required>
          </div>
          <div class="form-group">
            <label for="categorie">Categorie</label>
            <select name="categorie" id="categorie" class="form-control" required>
                <option value="">Kies een categorie</option>
                <option value="Algemeen">Algemeen</option>
                <option value="optie 2">Optie 2</option>
                <option value="optie 3">Optie 3</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="faq_new" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Faq
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile"
          style="margin-left: 0.5em;">
          Nieuwe Faq
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

    $query = "SELECT * FROM faq ORDER BY categoryid ASC";
    $query_run = mysqli_query($connection, $query);

    ?>
        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th> ID </th>
              <!-- <th> Gebruikersnaam</th> -->
              <th> Categorie</th>
              <th> Vraag</th>
              <th> Antwoord</th>
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
              <td> <?php echo $row['id']; ?> </td>
              <td> <?php echo $row['categoryid']; ?> </td>
              <td> <?php echo $row['question']; ?> </td>
              <td> <?php echo $row['answer']; ?> </td>
              <!-- <td> </td> -->
              <td>
                <form action="faq_edit.php" method="post">
                  <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                  <button type="submit" name="edit_faq" class="btn btn-success"> EDIT</button>
                </form>
              </td>
              <td>
                <form action="code.php" method="post">
                  <input type="hidden" name="delete_id" value=" <?php echo $row['id']; ?> ">
                  <button type="submit" name="faq_delete" class="btn btn-danger"> DELETE</button>
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