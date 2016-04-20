<?php include("inc/session_check.php"); ?>

<?php
include("inc/navbar_loggedin.php");

require_once("Mapper/Voting.php");
require_once("Mapper/VotingManager.php");

$voting_id = (int)htmlspecialchars($_GET["voting_id"], ENT_QUOTES, "UTF-8");
$VotingManager = new VotingManager();
$voting = $VotingManager->findById($voting_id);

?>

<html>
<meta http-equiv="refresh" content="5" >

<?php include("inc/head.php"); ?>

<body>

    <div class="container">
        <div class="jumbotron" style=background:whitesmoke>
            <h1>Frage: <?php echo $voting->frage ?></h1><br />
        </div>
    </div>

    <?php
    $con = mysqli_connect("localhost", "ts142", "roa3aijuPh", "u-ts142");
    
    $get_votes = "SELECT a_vote, b_vote, c_vote, d_vote FROM voting WHERE id=$voting->id";

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
    ?>

    
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
                                    {y: <?php echo $b ?>,  label: "B"},
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