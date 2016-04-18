<?php 
include("inc/session_check.php");

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

    <?php include("inc/navbar_loggedin.php"); ?>
    <div class="container">
        <div class="jumbotron" style=background:whitesmoke>
            <h1>Voting ID: <?php echo $voting_id ?></h1><br />
        </div>
    </div>

    <div class="container">
        
        <h2>Frage: <?php echo $voting->frage?> </h2>
        
        <form role="form" class="form-inlinecy" action="Mapper/VotingVoting.php" method="post">
            
            <div class="form-group">
                <input type="submit" name="a" id="a" value="<?php echo $voting->a ?>"/>
            </div>
            
            <div class="form-group">
                <input type="submit" name="b" id="b" value="<?php echo $voting->b ?>"/>
            </div>
            
            <div class="form-group">
                <input type="submit" name="c" id="c" value="<?php echo $voting->c ?>"/>
            </div>
            
            <div class="form-group">
                <input type="submit" name="d" id="d" value="<?php echo $voting->d ?>"/>
            </div>

            <div class="form-group">
                <input type="hidden" value="<?php echo htmlspecialchars($voting_id); ?>" class="form-control" name="id_voting" id="id_voting" readonly>
            </div>
        </form>
        
    </div>
           
</body>
</html>

