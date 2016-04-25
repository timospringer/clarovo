<?php 
include("inc/session_check.php");
?>

<!DOCTYPE html>
<html>

<?php include("inc/head.php"); ?>

<body>

<?php include("inc/navbar_loggedin.php"); ?>

<div class="container">

    <h2>Neue Vorlesung</h2><br />

    <form class="form-horizontal" role="form" action="VorlesungCreate_do.php" method="post">
        
        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Name:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-4">
                <button type="submit" class="btn btn-default">hinzufügen</button>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-5"</label>
            <div class="col-sm-6">
                <input type="hidden" value="<?php echo htmlspecialchars($dozent->id); ?>" class="form-control" name="id_dozent" id="id_dozent" readonly>
            </div>
        </div>
        
    </form>

</div>
</body>
</html>