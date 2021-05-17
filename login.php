<?php
$page_title = "IT_Winkel - Login Page";
include_once 'partials/header.php';
include_once 'partials/parseLogin2.php';
?>


<div class="container">
    <section class="col col-lg-7">

        <br>
        <h2>Login Formulier</h2>
        <hr>

        <div>
            <!-- If there is a result after the login: show a pop up(which is set in the utilities) -->
            <!-- however if there are empty parts in the login form show the following errors -->
            <?php
            if (isset($result)) echo $result; ?>
            <?php
            if (!empty($form_errors)) echo show_errors($form_errors); ?>
        </div>
        <div class="clearfix"></div>
        <form action="" method="post" class="login">
            <div class="form-group">
                <label for="emailField">E-mail</label>
                <input type="text" class="form-control" id="emailField" name="emailadres" placeholder="E-mail">
            </div>
            <br>
            <div class="form-group">
                <label for="wachtwoordField">Wachtwoord</label>
                <input type="password" name="wachtwoord" class="form-control" id="wachtwoordField" placeholder="Wachtwoord">
            </div>

            <div class="checkbox">
                <label>
                <br>
                    <input name="remember" value="yes" type="checkbox">Onthoud mij?
                </label>
            </div>
            <br>
            <!-- <a href="password_recovery_link.php">Wachtwoord vergeten?</a> -->
            <input type="hidden" name="token" value="<?php $token = _token();
                                                    $token = $_SESSION['token'];
                                                    echo $token;  
                                                    ?>">

            <button type="submit" name="loginBtn" class="btn btn-primary">Login</button>
            <a href="home.php">Terug</a>
        </form>
        

    </section>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php
include_once 'partials/parseFooter.php';
?>

