<!DOCTYPE html>
<html>
<?php 
include("inc/head.php");

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

include("inc/cookie_check.php");

if(isset($_COOKIE["$voting->id"])) echo "Sie haben schon gevotet!";
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
    
}
?>

<!DOCTYPE HTML>
<html>
<br />
<head>
    <script src="js/Chart.js"></script>
    <script src="js/jquery-2.2.3.min.js"></script>
</head>
<body>
<div class="container">
    <canvas id="myChart">
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ["A", "B", "C", "D"],
                    datasets: [
                        {
                            data: [<?php echo $a ?>, <?php echo $b ?>, <?php echo $c ?>, <?php echo $d ?>],
                            backgroundColor: [
                                "#FF6384",
                                "#36A2EB",
                                "#FFCE56",
                                "#9FF781"
                            ],
                            hoverBackgroundColor: [
                                "#FF6384",
                                "#36A2EB",
                                "#FFCE56",
                                "#9FF781"
                            ]
                        }]
                },
                options: {
                    cutoutPercentage: 0
                }
            });
        </script>
</div>
</body>
</html>