<?php include("inc/session_check.php"); ?>

<!DOCTYPE html>
<html>
<?php include("inc/head.php"); ?>

<body>

<?php include("inc/navbar_loggedin.php"); ?>

<div class="container">

    <div class="container">
        <div class="jumbotron" style=background:whitesmoke>
            <h1>Meine Vorlesungen<br />
                <a class="btn btn-default" href="VorlesungCreate_form.php" role="button"><span class="glyphicon glyphicon-education"></span> Vorlesung anlegen</a>
        </div>
    </div>
    
    <table class="table table-hover table-striped">
        <thead>
        <th class="col-md-1">id</th>
        <th class="col-md-5">Name</th>
        <th class="col-md-4"></th>
        <th class="col-md-3"></th>
        </thead>
        <tbody>

    <?php
        require_once("Mapper/Vorlesung.php");
        require_once("Mapper/VorlesungManager.php");
        $VorlesungManager = new VorlesungManager();
        $liste = $VorlesungManager->findAll($dozent->id);
        foreach ($liste as $vorlesung) {
            echo "<tr>";
            echo "<td>$vorlesung->id</td>";
            echo "<td>$vorlesung->name</td>";
            echo "<td>
                    <a href='VorlesungRead.php?vorlesung_id=$vorlesung->id' class='btn btn-success btn-sm'>anzeigen</a>
                    <a href='VorlesungDelete_do.php?vorlesung_id=$vorlesung->id' class='btn btn-danger btn-sm'>löschen</a>
                </td>";
            echo "<td></td>";
            echo "</tr>";
        }
    
    ?>
        
        </tbody>

        
        

</div>

</body>
</html>
