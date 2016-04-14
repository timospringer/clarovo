<!DOCTYPE html>
<html>

<?php include("inc/head.php"); ?>

<body>

<?php include("inc/navbar_loggedout.php"); ?>

<div class="container">
    <h2>Neuer Dozent</h2>

    <form class="form-horizontal" role="form" action="DozentCreate_do.php" method="post">
        <div class="form-group">
            <label for="login" class="col-sm-2 control-label">Benutzername:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="login" id="login" placeholder="Benutzername">
            </div>
        </div>

        <div class="form-group">
            <label for="vorname" class="col-sm-2 control-label">Vorname</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="vorname" id="vorname" placeholder="Vorname">
            </div>
        </div>

        <div class="form-group">
            <label for="nachname" class="col-sm-2 control-label">Nachname</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="nachname" id="nachname" placeholder="Nachname">
            </div>
        </div>

        <div class="form-group">
            <label for="password" class="control-label col-sm-2">Kennwort:</label>
            <div class="col-sm-4">
                <input type="password" class="form-control" name="password" id="password">
            </div>
        </div>

        <div class="form-group">
            <label for="password2" class="control-label col-sm-2">Kennwort (Wiederholen):</label>
            <div class="col-sm-4">
                <input type="password" class="form-control" name="password2" id="password2">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-4">
                <button type="submit" class="btn btn-default">Submit</button>
            </div>
        </div>
    </form>

</div>

</body>
</html>