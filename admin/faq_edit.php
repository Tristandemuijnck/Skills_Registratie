<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Faq Edit Pagina </h6>
        </div>

        <div class="card-body">

            <?php

    if(isset($_POST['edit_faq']))
    {
        $id = $_POST['edit_id'];
    
        $query = "SELECT * FROM faq WHERE id='$id' ";
        $query_run = mysqli_query($connection, $query);

        foreach($query_run as $row) 
    {  
        ?>
            <form action="code.php" method="POST">

                <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?> ">
                <div class="form-group">
                    <label> Vraag </label>
                    <input type="text" name="edit_question" value="<?php echo $row['question'] ?>" class="form-control"
                        placeholder="Enter Title">
                </div>
                <div class="form-group">
                    <label>Antwoord</label>
                    <input type="text" name="edit_answer" value="<?php echo $row['answer'] ?>" class="form-control"
                        placeholder="Enter Sub-title">
                </div>
                <div class="form-group">
                    <label for="categorie">Categorie</label>
                    <select name="edit_category" id="categorie" class="form-control" required>
                        <option value="">Kies een categorie</option>
                        <option value="Algemeen">Algemeen</option>
                        <option value="optie 2">Optie 2</option>
                        <option value="optie 3">Optie 3</option>
                    </select>
                </div>
              
                <a href="faq.php" class="btn btn-danger"> Cancel </a>
                <button type="submit" name="edit_faq" class="btn btn-primary"> Update </button>

            </form>

            <?php

        }}

        ?>

        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>