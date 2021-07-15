<?php
include('connection.php'); 
$email=$_POST['email']; 
$password=$_POST['password'];


if($email == "admin@admin.com" && $password =="admin")
{
    
echo '<script> alert("Admin Entry Detected   ")</script>';
echo "<script> location.href='admin-page.php'; </script>";


}

else{


$sql="SELECT user_id,user_email,user_password from user_info WHERE user_email='$email' && user_password='$password'";

$result=(mysqli_query($conn, $sql));

if ($result->num_rows>0 ) {
    while ($row = $result->fetch_object()) {
        $id = $row->user_id;
    }

    session_start(); 
    $_SESSION['session']=$id ;
 
echo '<script> alert("Logging in  ")</script>';
echo "<script> location.href='main-page.php'; </script>";
}

else{
    echo '<script> alert("Incorrect name or password ")</script>';
    echo "<script> location.href='login-signup.php'; </script>";

}}





?>