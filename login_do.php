<?php
require_once("Mapper/DozentManager.php");
require_once("Mapper/Dozent.php");

$login = htmlspecialchars($_POST["login"], ENT_QUOTES, "UTF-8");    #login wird $login zugewiesen
$password = htmlspecialchars($_POST["password"], ENT_QUOTES, "UTF-8");  #password wird $password zugewiesen

if (!empty($login) && !empty($password)) {  #wenn $login oder $password leer, dann ->else
    $DozentManager = new DozentManager();   #neues Objekt der Klasse DozentManager wird initialisiert
    $dozent = $DozentManager->login($login, $password); #Methode login der Klasse DozentManager wird mit $login und $password aufgerufen und $dozent zugewiesen
    if ($dozent==null) {
        header('Location: login.php');
        die();
    } else {
        session_start();
        $_SESSION ['dozent'] = $dozent;
        $_SESSION ['login'] = "1";
        header('Location: index.php');
        die();
    }
} else {
    echo "Error: Bitte alle Felder ausfüllen!<br/>";
}

