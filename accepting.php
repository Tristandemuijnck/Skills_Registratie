<?php 
include_once 'partials/header.php';
require_once('resources/dbconfig.php');
include('resources/functions.php');
// require_once('resources/functions.php');
	

// 	if (!isAdmin()) {
// 		$_SESSION['msg'] = "You must log in first";
// 		header('location: login.php');
// 	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style>
	.header {
		background: #003366;
	}
	button[name=register_btn] {
		background: #003366;
	}
	</style>

<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta charset="utf-8">

<title>PHP CRUD Operations using PDO Extension </title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">

<style type="text/css">

</style>

<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

</head>
<body>
	<div class="header">
		<h2>Admin - Home Page</h2>
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<div class="profile_info">
			<img src="images/admin_profile.png"  >

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="Beroepsproject3.php?logout='1'" style="color: red;">logout</a>
						&nbsp; <a href="create_user.php"> + add user</a>
						&nbsp; <a href="accepting.php"> + accept user</a>
					</small>

				<?php endif ?>
			</div>
		</div>
	</div>

	<div class="container">
	<a href="admin.php"> back to admin</a>
<div class="row">

	<div class="col-md-12">

		<h3>PHP CRUD Operations using PDO Extension</h3>
		<hr />

		<!-- <a href="insert.php"><button class="btn btn-primary"> Insert Record</button></a> -->

		<div class="table-responsive">

			<table user_ID="mytable" class="table table-bordred table-striped">

				<thead>

					<th>User_ID</th>

					<th>Stage_ID</th>

					<th>Bedrijf_ID</th>

					<th>Vacature</th>

					<th>Status</th>

					<th>Datum</th>




					<th>Accept</th>

					<th>Reject</th>

					

					

				</thead>

				<tbody>

					<?php

					$sql = "SELECT * from sollicitatie";

					//Prepare the query:

					$query = $dbh->prepare($sql);

					//Execute the query:

					$query->execute();

					//Assign the data which you pulled from the database (in the preceding step) to a variable.

					$results = $query->fetchAll(PDO::FETCH_OBJ);

					// For serial number initialization


					if ($query->rowCount() > 0) {

						//In case that the query returned at least one record, we can echo the records within a foreach loop:

						foreach ($results as $result) {

					?>

							<!-- Display Records -->

							<tr>


							    <td><?php echo htmlentities($result->user_ID); ?></td>

								<td><?php echo htmlentities($result->stage_ID); ?></td>

								<td><?php echo htmlentities($result->bedrijf_ID); ?></td>

								<td><?php echo htmlentities($result->vacature); ?></td>

								<td><?php echo htmlentities($result->status); ?></td>

								<td><?php echo htmlentities($result->datum); ?></td>

								<td><a href="accepting.php?id=<?php echo htmlentities($result->user_ID ); ?>"><button class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-ok"></span></button></a></td>

								<td><a href="accepting.php?del=<?php echo htmlentities($result->user_ID ); ?>"><button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><span class="glyphicon glyphicon-remove"></span></button></a></td>
								
								
							</tr>

					<?php

							// for serial number increment


						}
					} ?>

				</tbody>

			</table>

		</div>

	</div>

</div>

</div>
		
</body>
</html>

<?php

// include database connection file

// require_once('dbconfig.php');

// Code for record deletion

if(isset($_REQUEST['del']))

{

//Get row id

$uid=intval($_GET['del']);

//Qyery for deletion

$sql = "delete from sollicitatie WHERE user_ID=:user_ID";

// Prepare query for execution

$query = $dbh->prepare($sql);

// bind the parameters

$query->bindParam(':user_ID',$uid, PDO::PARAM_STR);

// Query Execution

$query->execute();

// Message after update
// echo "<script>alert('Record Updated successfully');</script>";
}

if(isset($_REQUEST['id']))

{

    $id = $_GET['id'];
    $query = "select * from particulier where user_ID = '$id'; ";
    if(count(fetchAll($query)) > 0){
        foreach(fetchAll($query) as $row){
            $username = $row['naam'];
            $adres = $row['adres'];
            $postcode = $row['postcode'];
			$telefoonnummer = $row['telefoonnummer'];
			$emailadres	= $row['emailadres'];
            $query = "INSERT INTO stageplek (stage_ID,naam,adres,postcode,telefoonnummer,emailadres) VALUES (NULL, '$username', '$adres', '$postcode', '$telefoonnummer','$emailadres');";
        }
        // $query .= "DELETE FROM requests WHERE requests.id = '$id';";
        if(performQuery($query)){
            echo "Account has been accepted.";
        }else{
            echo "Unknown error occured. Please try again.";
        }
    }else{
        echo "Error occured.";
	}
	
}