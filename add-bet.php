<?php
include('connection.php'); 
$team1=$_POST['team1']; 
$team2=$_POST['team2']; 
$team1_odds=$_POST['team1_odds']; 
$team2_odds=$_POST['team2_odds']; 
$status = "ongoing"; 
$total_odds = $team1_odds + $team2_odds ; 

if($total_odds != 1 )
{
    echo '<script> alert("Odds sum should be  = 1  ")</script>';
    echo "<script> location.href='admin-page.php'; </script>";
}
else 
{
    $sql = "INSERT INTO `total_bets_info`(`team1`, `team2`, `team1_odds`, `team2_odds`, `status`) VALUES ('$team1','$team2','$team1_odds','$team2_odds','$status')";
    $result=(mysqli_query($conn,$sql));
    if($result)
    {
        echo '<script> alert("Betting Match successfully Placed ")</script>';
        echo "<script> location.href='admin-page.php'; </script>";


    }

}






?>