<?php
    session_start();
    $_SESSION = array();
    session_destroy();
?>

<?php include("inc/head.php"); ?>

<body>

<?php include("inc/navbar_loggedout.php"); ?>


<div class="container">
    <h1>Sie haben sich ausgeloggt.</h1>
    <a href='login.php'>zurück zum Login</a>
</div>

</body>
</html>

