<?php
include('includes/header.php'); 
include('security.php');
include('geentoegang.php');
include('includes/navbar.php'); 
include('../filesLogic.php')
// include('includes/scripts.php');

?>

<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.1.0/mdb.min.js"> </script>

<!-- Tabs navs -->
<ul class="nav nav-tabs mb-3" id="ex1" role="tablist" style="margin-left: 1em;">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="ex1-tab-1" data-mdb-toggle="tab" href="#ex1-tabs-1" role="tab"
      aria-controls="ex1-tabs-1" aria-selected="true"><strong>Bezig</strong></a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="ex1-tab-2" data-mdb-toggle="tab" href="#ex1-tabs-2" role="tab" aria-controls="ex1-tabs-2"
      aria-selected="false"><strong>Geweigerd</strong></a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="ex1-tab-3" data-mdb-toggle="tab" href="#ex1-tabs-3" role="tab" aria-controls="ex1-tabs-3"
      aria-selected="false"><strong>Geaccepteerd</strong></a>
  </li>
</ul>
<!-- Tabs navs -->

<!-- Tabs content -->

    <!-- Tab 1 -->
<div class="tab-content" id="ex1-content">
  <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
    <h5 style="margin-left: 1.5em;">Nieuwe bedrijf sollicitaties</h5>
    <br>

    <div class="container-fluid">
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Bedrijf's Sollicitaties
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add User Profile 
            </button> -->
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

    $query1 = "SELECT *
    FROM bd_vacature WHERE status = 'bezig'";

    $query_run1 = mysqli_query($connection, $query1); 

    ?>
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                <th> Bedrijf_ID </th>
                <th> Bedrijfsnaam </th>
                <th> Omschrijving </th>
                <th> Vacature</th>
                <th> Stageplek </th>
                <th> Startdatum </th>
                <th> Functieomschrijving</th>
                <th> Start datum </th>
                <th> Status </th>
                <th> Accepteren </th>
                <th> Weigeren </th>
                </tr>
              </thead>
              <tbody>

                <?php

          if(mysqli_num_rows($query_run1) > 0)
          {
            while($row = mysqli_fetch_assoc($query_run1))
            {
              ?>

                <tr>
                  <td> <?php echo $row['bedrijf_ID']; ?> </td>
                  <td> <?php echo $row['bedrijfsnaam']; ?> </td>
                  <td> <?php echo $row['omschrijving']; ?> </td>
                  <td> <?php echo $row['vacature']; ?> </td>
                  <td> <?php echo $row['stageplek']; ?> </td>
                  <td> <?php echo $row['startdatum']; ?> </td>
                  <td> <?php echo $row['functieomschrijving']; ?> </td>
                  <td> <?php echo $row['startdatum']; ?></td>
                  <td> <?php echo $row['status']; ?></td>

                  
                  <td>
                    <form action="code2.php" method="post">
                      <input type="hidden" name="sollicitant_id" value="<?php echo $row['bedrijf_ID']; ?>">
                      <button type="submit" name="accept_sollicitant_btn" class="btn btn-success"> Accepteren</button>
                    </form>
                  </td>
                  <td>
                    <form action="code2.php" method="post">
                      <input type="hidden" name="delete_user_id" value=" <?php echo $row['bedrijf_ID']; ?> ">
                      <button type="submit" name="weigeren_btn" class="btn btn-danger"> Weigeren</button>
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

          <!-- Tab 2 -->
  </div>
  <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
    <h5 style="margin-left: 1.5em;">Geweigerde bedrijf sollicitaties</h5>
    <br> 

    <div class="container-fluid">

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Sollicitanten
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add User Profile 
            </button> -->
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

      $query2 = "SELECT *
      FROM bd_vacature WHERE status = 'geweigerd'";

      $query_run2 = mysqli_query($connection, $query2); 

    ?>
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                <th> bedrijf_ID </th>
                <th> bedrijfsnaam </th>
                <th> omschrijving </th>
                <th> vacature</th>
                <th> stageplek </th>
                <th> startdatum </th>
                <th> functieomschrijving</th>
                <th> status </th>
                <th> DELETE </th>
                </tr>
              </thead>
              <tbody>

                <?php

          if(mysqli_num_rows($query_run2) > 0)
          {
            while($row = mysqli_fetch_assoc($query_run2))
            {
              ?>
                <tr>
                <td> <?php echo $row['bedrijf_ID']; ?> </td>
                  <td> <?php echo $row['bedrijfsnaam']; ?> </td>
                  <td> <?php echo $row['omschrijving']; ?> </td>
                  <td> <?php echo $row['vacature']; ?> </td>
                  <td> <?php echo $row['stageplek']; ?> </td>
                  <td> <?php echo $row['startdatum']; ?> </td>
                  <td> <?php echo $row['functieomschrijving']; ?> </td>
                  <td> <?php echo $row['status']; ?></td>
                      
                  
                  <td>
                    <form action="code.php" method="post">
                      <input type="hidden" name="delete_user_id" value=" <?php echo $row['bedrijf_ID']; ?> ">
                      <button type="submit" name="delete_geweigerd_btn" class="btn btn-danger"> Verwijder </button>
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

          <!-- Tab 3 -->
  </div>
  <div class="tab-pane fade" id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
    <h5 style="margin-left: 1.5em;">Geaccepteerde bedrijf sollicitaties</h5>
    <br>

    <div class="container-fluid">

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Sollicitanten
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add User Profile 
            </button> -->
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

    $query3 = "SELECT *
    FROM bd_vacature WHERE status = 'geaccepteerd'";

    $query_run3 = mysqli_query($connection, $query3); 

    ?>
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
              <thead>
              <tr>
                <th> Bedrijf_ID </th>
                <th> Bedrijfsnaam </th>
                <th> Omschrijving </th>
                <th> Vacature</th>
                <th> Stageplek </th>
                <th> Startdatum </th>
                <th> Functieomschrijving</th>
                <th> Start datum </th>
                <th> Status </th>

                </tr>
              </thead>
              <tbody>

                <?php

          if(mysqli_num_rows($query_run3) > 0)
          {
            while($row = mysqli_fetch_assoc($query_run3))
            {
              ?>

                <tr>
                  <td> <?php echo $row['bedrijf_ID']; ?> </td>
                  <td> <?php echo $row['bedrijfsnaam']; ?> </td>
                  <td> <?php echo $row['omschrijving']; ?> </td>
                  <td> <?php echo $row['vacature']; ?> </td>
                  <td> <?php echo $row['stageplek']; ?> </td>
                  <td> <?php echo $row['startdatum']; ?> </td>
                  <td> <?php echo $row['functieomschrijving']; ?> </td>
                  <td> <?php echo $row['startdatum']; ?></td>
                  <td> <?php echo $row['status']; ?></td>
                  
                 

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

  </div>
</div>
<!-- Tabs content -->




<?php
include('includes/scripts.php');
include('includes/footer.php');
?>