<?php include("inc/session_check.php"); ?>

<?php
require_once("Mapper/VotingManager.php");
require_once("Mapper/Voting.php");

$frage = htmlspecialchars($_POST["frage"], ENT_QUOTES, "UTF-8");
$a = htmlspecialchars($_POST["a"], ENT_QUOTES, "UTF-8");
$b = htmlspecialchars($_POST["b"], ENT_QUOTES, "UTF-8");
$c = htmlspecialchars($_POST["c"], ENT_QUOTES, "UTF-8");
$d = htmlspecialchars($_POST["d"], ENT_QUOTES, "UTF-8");
$id_vorlesung = htmlspecialchars($_POST["id_vorlesung"], ENT_QUOTES, "UTF-8");

if (!empty($frage) && !empty($a) && !empty($b)) {
    $nutzerdaten = [
        "frage" => $frage,
        "a" => $a,
        "b" => $b,
        "c" => $c,
        "d" => $d,
        "id_vorlesung" => $id_vorlesung
    ];
    $voting = new Voting($nutzerdaten);
    $VotingManager = new VotingManager();
    $VotingManager->save($voting);
    header("location: VorlesungRead.php?vorlesung_id=$id_vorlesung");
} else {
    echo "Error: Bitte alle Felder ausfüllen!<br/>";
}

?>