<?php

include("Manager.php");
include("Voting.php");
include("VotingManager.php");
$con = mysqli_connect("localhost", "ts142", "roa3aijuPh", "u-ts142");

$voting_id = (int)htmlspecialchars($_POST["id_voting"], ENT_QUOTES, "UTF-8");
$VotingManager = new VotingManager();
$voting = $VotingManager->findById($voting_id);

if(isset($_POST['a'])){
    $a_vote = "UPDATE voting SET a_vote=a_vote+1 WHERE id=$voting_id";
    $run_a_vote =mysqli_query($con, $a_vote);

    echo"<h2 align='center'>Du hast erfolgreich für \"a\" gevotet!</h2>";
}

if(isset($_POST['b'])){
    $b_vote = "UPDATE voting SET b_vote=b_vote+1 WHERE id=$voting_id";
    $run_b_vote =mysqli_query($con, $b_vote);

    echo"<h2 align='center'>Du hast erfolgreich für \"b\" gevotet!</h2>";
}

if(isset($_POST['c'])){
    $c_vote = "UPDATE voting SET c_vote=c_vote+1 WHERE id=$voting_id";
    $run_c_vote =mysqli_query($con, $c_vote);

    echo"<h2 align='center'>Du hast erfolgreich für \"c\" gevotet!</h2>";
}

if(isset($_POST['d'])){
    $d_vote = "UPDATE voting SET d_vote=d_vote+1 WHERE id=$voting_id";
    $run_d_vote =mysqli_query($con, $d_vote);

    echo"<h2 align='center'>Du hast erfolgreich für \"d\" gevotet!</h2>";
}


$get_votes = "SELECT a_vote, b_vote, c_vote, d_vote FROM voting WHERE id=$voting_id";

$run_votes = mysqli_query($con, $get_votes);

$row_votes = mysqli_fetch_array($run_votes);

$a = $row_votes['a_vote'];
$b = $row_votes['b_vote'];
$c = $row_votes['c_vote'];
$d = $row_votes['d_vote'];

$count = $a+$b+$c+$d;

$per_a = round($a*100/$count) . "%";
$per_b = round($b*100/$count) . "%";
$per_c = round($c*100/$count) . "%";
$per_d = round($d*100/$count) . "%";

echo"

<div class='container'>
    <table class=\"table table-hover table-striped\">
    <thead>
    <th class=\"col-md-3\">$a ($per_a)</th>
    <th class=\"col-md-3\">$b ($per_b)</th>
    <th class=\"col-md-3\">$c ($per_c)</th>
    <th class=\"col-md-3\">$d ($per_d)</th>
    </thead>
</div>

";


?>