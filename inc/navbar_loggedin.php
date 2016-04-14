<?php
    require_once("Mapper/Dozent.php");
    $user = $_SESSION ["user"];
?>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-stats"></span> clarovo</a>
            <a class="btn btn-default navbar-btn" href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a>
            <a class="btn btn-default navbar-btn pull-right" href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
            <a class="btn btn-default navbar-btn pull-right btn-space" href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $dozent->login; ?></a>
        </div>
    </div>
</nav>

