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
<head>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.0.0/Chart.js"></script>
</head>

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

    
        <div class="ct-chart ct-square"</div>
    <script>

        var data = {
            labels: ['A', 'B', 'C', 'D'],
            series: [
                [<?php echo $a ?>, <?php echo $b ?>, <?php echo $c ?>, <?php echo $d ?>]
            ]
        };

        var options = {
            height: 450,
            width: 400,
            high: 10,
            low: 0,
            axisX: {
                labelInterpolationFnc: function(value, index) {
                    return index % 2 === 0 ? value : null;
                }
            }
        };

        new Chartist.Bar('.ct-chart', data, options);
        
    </script>


</body>
</html>