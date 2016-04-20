<!DOCTYPE html>
<html>
<?php 
include("inc/head.php");
include("inc/cookie_check.php");
?>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-stats"></span> clarovo</a>
            <a class="btn btn-default navbar-btn" href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a>
        </div>
    </div>
</nav>
</body>
</html>

<?php

include("Mapper/Manager.php");
include("Mapper/Voting.php");
include("Mapper/VotingManager.php");
$con = mysqli_connect("localhost", "ts142", "roa3aijuPh", "u-ts142");

$voting_id = (int)htmlspecialchars($_POST["id_voting"], ENT_QUOTES, "UTF-8");
$VotingManager = new VotingManager();
$voting = $VotingManager->findById($voting_id);

if(isset($_COOKIE["HALLO"])) echo "Sie haben schon gevotet!";
else {
    if(isset($_POST['a'])){
        $a_vote = "UPDATE voting SET a_vote=a_vote+1 WHERE id=$voting_id";
        $run_a_vote =mysqli_query($con, $a_vote);

        echo"<h2 align='center'>Du hast erfolgreich für \"a\" gevotet! <br /></h2>";
    }

    if(isset($_POST['b'])){
        $b_vote = "UPDATE voting SET b_vote=b_vote+1 WHERE id=$voting_id";
        $run_b_vote =mysqli_query($con, $b_vote);

        echo"<h2 align='center'>Du hast erfolgreich für \"b\" gevotet! <br /></h2>";
    }

    if(isset($_POST['c'])){
        $c_vote = "UPDATE voting SET c_vote=c_vote+1 WHERE id=$voting_id";
        $run_c_vote =mysqli_query($con, $c_vote);

        echo"<h2 align='center'>Du hast erfolgreich für \"c\" gevotet! <br /></h2>";
    }

    if(isset($_POST['d'])){
        $d_vote = "UPDATE voting SET d_vote=d_vote+1 WHERE id=$voting_id";
        $run_d_vote =mysqli_query($con, $d_vote);

        echo"<h2 align='center'>Du hast erfolgreich für \"d\" gevotet! <br /></h2>";
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

    /* echo"

    <div class='container'>
        <table class=\"table table-hover table-striped\">
        <thead>
        <th class=\"col-md-3\">A</th>
        <th class=\"col-md-3\">B</th>
        <th class=\"col-md-3\">C</th>
        <th class=\"col-md-3\">D</th>
        </thead>
        <tbody>
            <td class=\"col - md - 3\">$a ($per_a)</td>
            <td class=\"col - md - 3\">$b ($per_b)</td>
            <td class=\"col - md - 3\">$c ($per_c)</td>
            <td class=\"col - md - 3\">$d ($per_d)</td>
        </tbody>
    </div>

    ";
    */
    
}
?>

<!DOCTYPE HTML>
<html>
<br />
<head>
    <title>Results </title>
    <script type="text/javascript">
        window.onload = function () {
            var chart = new CanvasJS.Chart("chartContainer",
                {
                    title:{
                        text: "Voting-Ergebnisse"
                    },
                    animationEnabled: true,
                    axisY: {
                        title: "Votes"
                    },
                    legend: {
                        verticalAlign: "bottom",
                        horizontalAlign: "center"
                    },
                    theme: "theme2",
                    data: [

                        {
                            type: "column",
                            showInLegend: true,
                            legendMarkerColor: "grey",
                            legendText: "Votes",
                            dataPoints: [
                                {y: <?php echo $a ?>, label: "A"},
                                {y: <?php echo $b ?>,  label: "B" },
                                {y: <?php echo $c ?>,  label: "C"},
                                {y: <?php echo $d ?>,  label: "D"},
                            ]
                        }
                    ]
                });

            chart.render();
        }
    </script>
    <script type="text/javascript" src="inc/canvasjs.min.js"></script>
</head>
<body>
<div id="chartContainer" style="height: 300px; width: 100%;">
</div>
</body>
</html>