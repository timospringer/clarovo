<?php include("inc/session_check.php"); ?>

<?php
require_once("Mapper/Vorlesung.php");
require_once("Mapper/VorlesungManager.php");

$id = (int)htmlspecialchars($_GET["vorlesung_id"], ENT_QUOTES, "UTF-8");
$VorlesungManager = new VorlesungManager();
$vorlesung = $VorlesungManager->findById($id);
$VorlesungManager->delete($vorlesung);

header('Location: index.php');



