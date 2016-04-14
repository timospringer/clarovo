<?php include("inc/session_check.php"); ?>

<?php

require_once("Mapper/DozentManager.php");
require_once("Mapper/Dozent.php");

$login = htmlspecialchars($_POST["login"], ENT_QUOTES, "UTF-8");
$vorname = htmlspecialchars($_POST["vorname"], ENT_QUOTES, "UTF-8");
$nachname = htmlspecialchars($_POST["nachname"], ENT_QUOTES, "UTF-8");
$password = htmlspecialchars($_POST["password"], ENT_QUOTES, "UTF-8");
$password2 = htmlspecialchars($_POST["password2"], ENT_QUOTES, "UTF-8");

if (!empty($login) && !empty($vorname) && !empty($nachname) && !empty($password) && !empty($password2)) {
    $nutzerdaten = [
        "login" => $login,
        "vorname" => $vorname,
        "nachname" => $nachname,
        "hash" => password_hash($password, PASSWORD_DEFAULT)
    ];
    $dozent = new Dozent($nutzerdaten);
    $DozentManager = new DozentManager();
    $DozentManager->create($dozent);
    header('Location: index.php');
} else {
    echo "Error: Bitte alle Felder ausfüllen!<br/>";
}