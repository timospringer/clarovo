<?php 
include("inc/session_check.php");

$vorlesung_id = htmlspecialchars($_GET["vorlesung_id"], ENT_QUOTES, "UTF-8");
?>

<!DOCTYPE html>
<html>

<?php include("inc/head.php"); ?>

<body>

<?php include("inc/navbar_loggedin.php"); ?>

<div class="container">

    <h2>Neues Voting</h2>

    <form class="form-horizontal" role="form" action="VotingCreate_do.php" method="post">

        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Frage:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="frage" id="frage" placeholder="Frage">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="name">A:</label>
            <div class="col-sm-4">
                <input required type="text" class="form-control" name="a" id="a" placeholder="Antwort A">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="name">B:</label>
            <div class="col-sm-4">
                <input required type="text" class="form-control" name="b" id="b" placeholder="Antwort B">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="name">C:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="c" id="c" placeholder="Antwort C">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="name">D:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="d" id="d" placeholder="Antwort D">
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
                <input type="hidden" value="<?php echo htmlspecialchars($vorlesung_id);?>" class="form-control" name="id_vorlesung" id="id_vorlesung" readonly>
            </div>
        </div>
    </form>

</div>
</body>
</html>