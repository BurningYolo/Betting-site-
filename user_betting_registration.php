
<?php

session_start(); 
if(isset($_SESSION['session'])){
  $id=$_SESSION['session']; 
include('connection.php'); 
$sql= "SELECT user_credit from user_info where user_id = $id "; 
$result=(mysqli_query($conn, $sql));

while($row=mysqli_fetch_array($result)) 
{
  $total_credit = $row['user_credit']; 
}


if(isset($_POST['submit1'] ))
{
  $value = $_POST['submit1']; 
  $team1 = $_POST['team1']; 
  $team2 = $_POST['team2']; 
  $status = $_POST['status']; 
  $betting_credit = $_POST['betting_credit1'];  
  

  if($betting_credit == null)
  {
    echo '<script> alert("Betting Credit Not Set")</script>';
    echo "<script> location.href='main-page.php'; </script>";


  }
  else if($total_credit < $betting_credit)
  {
    echo '<script> alert("Your account does not have this much credit ")</script>';
    echo "<script> location.href='main-page.php'; </script>";


  }
  else 
  {
    $sql= "SELECT * FROM betting_info WHERE (user_id='$id' AND betting_team1 = '$team1' AND betting_team2 = '$team2') OR (user_id='$id' AND betting_team1 = '$team2' AND betting_team2 = '$team1')";
    $result=(mysqli_query($conn, $sql));

if ($result->num_rows>0 ) {

      echo '<script> alert("Betting Teams Already present in Database")</script>';
    echo "<script> location.href='main-page.php'; </script>";
  }
  else {
    $sql="INSERT INTO betting_info (user_id,betting_team1,betting_team2,betting_status,betting_credit) VALUES ('$id','$team1','$team2','$status','$betting_credit')";
    $result=(mysqli_query($conn, $sql));
    if($result)
    {
      $total_credit = $total_credit - $betting_credit ; 

      $sql="UPDATE user_info SET user_credit='$total_credit' where user_id=$id"; 
      $result=(mysqli_query($conn, $sql));


      
      echo '<script> alert("Bet successfully placed")</script>';
      echo "<script> location.href='main-page.php'; </script>";


    }



  }
  


}
}

else if (isset($_POST['submit2']))
{
  $team1 = $_POST['team2']; 
  $team2 = $_POST['team1']; 
  $status = $_POST['status']; 
  $betting_credit = $_POST['betting_credit2'];  
  



    if($betting_credit == null)
  {
    echo '<script> alert("Betting Credit Not Set")</script>';
    echo "<script> location.href='main-page.php'; </script>";
  }
  if($betting_credit == null)
  {
    echo '<script> alert("Betting Credit Not Set")</script>';
    echo "<script> location.href='main-page.php'; </script>";


  }
  else if($total_credit < $betting_credit)
  {
    echo '<script> alert("Your account does not have this much credit ")</script>';
    echo "<script> location.href='main-page.php'; </script>";


  }
  else 
  {
    $sql= "SELECT * FROM betting_info WHERE (user_id='$id' AND betting_team1 = '$team1' AND betting_team2 = '$team2') OR (user_id='$id' AND betting_team1 = '$team2' AND betting_team2 = '$team1')";
    $result=(mysqli_query($conn, $sql));

if ($result->num_rows>0 ) {

      echo '<script> alert("Betting Teams Already present in Database")</script>';
    echo "<script> location.href='main-page.php'; </script>";
  }
  else {
    $sql="INSERT INTO betting_info (user_id,betting_team1,betting_team2,betting_status,betting_credit) VALUES ('$id','$team1','$team2','$status','$betting_credit')";
    $result=(mysqli_query($conn, $sql));
    if($result)
    {
      $total_credit = $total_credit - $betting_credit ; 

      $sql="UPDATE user_info SET user_credit='$total_credit' where user_id=$id"; 
      $result=(mysqli_query($conn, $sql));


      
      echo '<script> alert("Bet successfully placed")</script>';
      echo "<script> location.href='main-page.php'; </script>";


    }

  }
  
}

}
}

else 
{
  echo '<script> alert("Please Login First")</script>';
  echo "<script> location.href='main-page.php'; </script>";

}






?> 