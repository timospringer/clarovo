<?php

require_once("Mapper/Voting.php");
require_once("Mapper/VotingManager.php");

$voting_id = (int)htmlspecialchars($_GET["voting_id"], ENT_QUOTES, "UTF-8");
$VotingManager = new VotingManager();
$voting = $VotingManager->findById($voting_id);

?>

<!DOCTYPE html>
<html>

<?php include("inc/head.php"); ?>

<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-stats"></span> clarovo</a>
            <a class="btn btn-default navbar-btn" href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a>
        </div>
    </div>
</nav>

    <div class="container">
        <div class="jumbotron" style=background:whitesmoke>
            <h1>Voting ID: <?php echo $voting_id ?></h1><br />
        </div>
    </div>

    <div class="container">
        
        <h2>Frage: <?php echo $voting->frage?> </h2><br />
        
        <form role="form" class="form-inlinecy" action="VotingVoting.php" method="post">
            
            <div class="form-group">
                <input type="submit" name="a" id="a" value="<?php echo $voting->a ?>"/>
            </div>
            
            <div class="form-group">
                <input type="submit" name="b" id="b" value="<?php echo $voting->b ?>"/>
            </div>

            <?php  if(isset($voting->c) && !empty($voting->c))
            { ?>
                <div class="form-group">
                    <input type="submit" name="c" id="c" value="<?php echo $voting->c ?>"/>
                </div>
            <?php } ?>

            <?php  if(isset($voting->d) && !empty($voting->d))
            { ?>
                <div class="form-group">
                    <input type="submit" name="d" id="d" value="<?php echo $voting->d ?>"/>
                </div>
            <?php } ?>

            <div class="form-group">
                <input type="hidden" value="<?php echo htmlspecialchars($voting_id); ?>" class="form-control" name="id_voting" id="id_voting" readonly>
            </div>
        </form>
        
    </div>

<input type="hidden" id="refreshed" value="no">

<script type="text/javascript">
    onload=function(){
        var e=document.getElementById("refreshed");
        if(e.value=="no")e.value="yes";
        else{e.value="no";location.reload();}
    }
</script>


</body>
</html>

