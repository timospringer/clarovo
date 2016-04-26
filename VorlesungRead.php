<?php 
include("inc/session_check.php");

require_once("Mapper/Vorlesung.php");
require_once("Mapper/VorlesungManager.php");

$vorlesung_id = (int)htmlspecialchars($_GET["vorlesung_id"], ENT_QUOTES, "UTF-8");
$VorlesungManager = new VorlesungManager();
$vorlesung = $VorlesungManager->findById($vorlesung_id);
?>

<!DOCTYPE html>
<html>

<?php include("inc/head.php"); ?>

<body>

    <?php include("inc/navbar_loggedin.php"); ?>
    <div class="container">
        <div class="jumbotron" style=background:whitesmoke>
            <h1><?php echo $vorlesung->name ?></h1><br />
            <?php echo "<a href='VotingCreate_form.php?vorlesung_id=$vorlesung_id' class='btn btn-default' role='button'><span class='glyphicon glyphicon-stats'></span> Voting anlegen</a>" ?>
        </div>
    </div>

    <div class="container">

        <h1>Votings</h1>
        <table class="table table-hover table-striped">
            <thead>
            <tr><th class="col-md-1">id</th>
            <th class="col-md-2">Frage</th>
            <th class="col-md-1">Antwort A</th>
            <th class="col-md-1">Antwort B</th>
            <th class="col-md-1">Antwort C</th>
            <th class="col-md-1">Antwort D</th>
            <th class="col-md-2"></th></tr>
            </thead>
            <tbody>

            <?php
            require_once("Mapper/Voting.php");
            require_once("Mapper/VotingManager.php");
            $VotingManager = new VotingManager();
            $liste = $VotingManager->findAll($vorlesung->id);
            foreach ($liste as $voting) {
                echo "<tr>";
                echo "<td>$voting->id</td>";
                echo "<td>$voting->frage</td>";
                echo "<td>$voting->a</td>";
                echo "<td>$voting->b</td>";
                echo "<td>$voting->c</td>";
                echo "<td>$voting->d</td>";
                echo "<td>
                        <a href='QR_Code.php?voting_id=$voting->id' class='btn btn-primary btn-sm'>QR-Code</a>
                        <a href='VotingResult.php?voting_id=$voting->id' class='btn btn-success btn-sm'>anzeigen</a>
                        <a href='VotingDelete_do.php?voting_id=$voting->id' class='btn btn-danger btn-sm'>löschen</a>
                      </td>";
                echo "</tr>";
            }
            ?>
            </tbody>
    </div>
           
</body>
</html>

