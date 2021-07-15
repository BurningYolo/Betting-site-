<?php 
session_start(); 
$id=$_SESSION['session']; 
include('connection.php'); 
$credit=$_POST['credit']; 

if ($credit > 5000)
{
echo '<script> alert( "Credit entered is beyond Limit   ")</script>';
echo "<script> location.href='user-profile.php'; </script>";
}
else 
{


$sql="UPDATE user_info SET user_credit=user_credit+'$credit' WHERE user_id = '$id'";
$result=(mysqli_query($conn, $sql));

if ($result) {

echo '<script> alert( "Transaction Successful , Your total credit has been updated   ")</script>';
echo "<script> location.href='user-profile.php'; </script>";
}
else 
{
    echo '<script> alert( "Error updating record , Please try again later ...   ")</script>';
echo "<script> location.href='user-profile.php'; </script>";

}

}






?>