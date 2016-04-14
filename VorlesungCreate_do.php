<?php include("inc/session_check.php"); ?>

<?php
require_once("Mapper/VorlesungManager.php");
require_once("Mapper/Vorlesung.php");

$name = htmlspecialchars($_POST["name"], ENT_QUOTES, "UTF-8");
$id_dozent = htmlspecialchars($_POST["id_dozent"], ENT_QUOTES, "UTF-8");

if (!empty($name)) {
    $nutzerdaten = [
        "name" => $name,
        "id_dozent" => $id_dozent
    ];
    $vorlesung= new Vorlesung($nutzerdaten);
    $VorlesungManager = new VorlesungManager();
    $VorlesungManager->save($vorlesung);
    header('Location: index.php');
} else {
    echo "Error: Bitte alle Felder ausfüllen!<br/>";
}