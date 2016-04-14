<?php include("inc/session_check.php"); ?>

<?php
require_once("Mapper/Voting.php");
require_once("Mapper/VotingManager.php");

require_once("Mapper/Vorlesung.php");
require_once("Mapper/VorlesungManager.php");


$id = (int)htmlspecialchars($_GET["voting_id"], ENT_QUOTES, "UTF-8");
$VotingManager = new VotingManager();
$voting = $VotingManager->findById($id);

$VotingManager = new VotingManager();
$voting = $VotingManager->findById($id);
$VotingManager->delete($voting);


require_once("Mapper/Vorlesung.php");
require_once("Mapper/VorlesungManager.php");
header("location: VorlesungRead.php?vorlesung_id=$voting->id_vorlesung");


?>
