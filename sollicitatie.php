<?php 
//  error_reporting(E_ALL);  
require_once('resources/dbconfig.php');
include_once 'partials/header.php';
include_once 'filesLogic.php';


$id = $_SESSION['user_ID'];
if(!$id){
    
  echo "<script>
  Swal.fire({
      title: 'U moet eerst ingeloged zijn om te kunnen solliciteren',
      icon: 'warning',
      showConfirmButton: false,
  })
  setTimeout(function(){
      window.location.href = 'login.php';
  }, 1500);
  </script>"; 
} else {

}


?>
<html>
    
<head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

<body>

<!-- begin form -->
<div id="banner">
  <img alt="my banner" style="width:100%;" src="images/banner2.jpg" height="70%">
</div>

<div class="container">
        <div class="clearfix"></div>
        <form action="" method="POST" class="label" enctype="multipart/form-data">
        
</div>
    
          
  <div class="container">
    <br>
  <h2>Sollicitatie</h2>
  <br>

  <form class="form-group" action="sendEmail.php" method="post" >
  <form class="form-horizontal">
    <div class="form-group" >
      <label class="control-label col-sm-2" for="naam">Naam:</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" id="naam" placeholder="Vul uw naam in" name="naam" required>
      </div>
    </div>
  
    <div class="form-group" style="margin-top: 1em;">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-3">          
        <input type="email" class="form-control" id="email" placeholder="Vul uw email in" name="email" required>
      </div>
    </div>
   
    <div class="form-group" style="margin-top: 1em;">
      <label class="control-label col-sm-2" for="email">Vacature:</label>
      <div class="col-sm-3">          
      
      <select class="form-select" aria-label="Default select example" id="vacature" name="vacature" required>
    <option selected>Kies vacature...</option>
    <option value="Applicatie ontwikkeling">Applicatie ontwikkeling</option>
    <option value="ICT-Beheer">ICT-Beheer</option>
    <option value="Cyber Security">Cyber Security</option>
    </select>
      </div>
    </div>
 
 
    <div class="form-group" style="margin-top: 1em;">
    <label class="control-label col-sm-7" for="myfile">Cv:</label>
    <div class="col-sm-10">  
    <input type="file" class="form-control-file" id="myfile" name="myfile" multiple enctype="multipart/form-data" required>
  </div>

  <div class="form-group" style="margin-top: 1em;">
    <label class="control-label col-sm-7" for="myfile">Motivatie brief:</label>
    <div class="col-sm-10">  
    <input type="file" class="form-control-file" id="myfile1" name="myfile1" multiple required>
  </div>
  <br>
<div class="form-check" style="margin-left: 0.5%; margin-top: 1em;" >
  <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
  <label class="form-check-label" for="exampleCheck1">
  <p>Door het aanvinken van deze knop gaat u akkoord met onze  <a href="javascript:void(0)">Voorwaarden en privacy</a>.</p>
  </label>
</div>

<br>

    <div class="form-group">        

            <input type="hidden" name="user_ID" id="user_ID" value=" <?php echo $_SESSION['user_ID'] ?> ">
            <input type="hidden" name="token" value="<?php if (function_exists('_token')) echo _token(); ?>">
      <div class="col-sm-offset-2 col-sm-10" style="margin-top: 1em;">

        <button type="submit" name="signupBtn" onclick="sendEmail()" value="Send An Email" class="btn btn-danger">Verzenden</button>
        <a href="vacatures.php" class="btn btn-warning"> Ga terug</a>

      </div>
    </div>
  </form>
 </div>
</form>
<br>
</div>
    
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

	<script type="text/javascript">
        function sendEmail() {
            var name = $("#name");
            var email = $("#email");
            var subject = $("#subject");
            var body = $("#body");
            var vacature = $("#vacature");
            var myfile = $("#myfile");
            var myfile = $("#myfile2");

            if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body) && isNotEmpty(vacature) && isNotEmpty(myfile)) {
                $.ajax({
                   url: 'sendEmail.php',
                   method: 'POST',
                   dataType: 'json',
                   data:{
                       name: name.val(),
                       email: email.val(),
                       subject: subject.val(),
                       body: body.val(),
                       vacature: vacature.val(),
                       myfile: myfile.val()
                   }, success: function (response) {
                        $('#myForm')[0].reset();
                        $('.sent-notification').text("Message Sent Successfully.");
                   }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
    </script>
<!-- end form -->



<!-- Footer

</body>
</html>

<?php 
 include_once 'partials/parseFooter.php';
?>




