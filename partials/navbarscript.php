<?php
if (isset($_SESSION['user_ID'])){
    $sqlQuery = "SELECT * FROM particulier WHERE user_ID = ?"; 
    $statement = $db->prepare($sqlQuery); 
    $data = array($_SESSION['user_ID']);
    $statement->execute($data);
    if($statement->rowCount() > 0) {
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $titel = $row["titel"];
        if ($titel == "particulier" || isCookieValid($db)) : echo  "Rol: " . $titel;?>
            <li class="nav-item"><a class="nav-link" href="home.php">Home</a><li>
            <li class="nav-item"><a class="nav-link" href="#">Particulier</a><li>
            <li class="nav-item"><a class="nav-link" href="logout.php">Uitloggen</a><li>
            <!-- <li><a class="nav-link" href="#">Test</a><li> -->
            <li class="nav-item"><a class="nav-link" href="vacatures.php">Vacatures</a></li>

        <?php elseif ($titel == "admin" || isCookieValid($db)): ?>
            <!-- if username is not active and there is no account available show -->
            <li class="nav-item"><a class="nav-link" href="home.php">Home</a><li>
            <li class="nav-item"><a class="nav-link" href="admin/login.php">Admin Panel</a><li>
            <li class="nav-item"><a class="nav-link" href="logout.php">Uitloggen</a><li>
            <li class="nav-item"><a class="nav-link" href="#">cases</a><li>
            <li class="nav-item"><a class="nav-link" href="#">tickets</a><li>
        <?php endif;?>
        
        <?php }}
        else{
            ?>
            <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
            <li class="nav-item"><a class="nav-link" href="signupnew.php">Registreren</a></li>
            <li class="nav-item"><a class="nav-link" href="login.php">Inloggen</a></li>
            <li class="nav-item"><a class="nav-link" href="vacatures.php">Vacatures</a></li>
            <li class="nav-item"><a class="nav-link" href="aboutblog.php">Over Ons</a></li>
            <?php
        }

        ?>