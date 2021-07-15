<?php
include('connection.php'); 
$email=$_POST['email']; 
$password=$_POST['password'];
$name=$_POST['name']; 
$date=$_POST['date']; 
$date1 = DateTime::createFromFormat("Y-m-d",$date);
$repassword=$_POST['repassword']; 
$credit = 100; 





$sql="SELECT user_email from user_info where user_email ='$email' ";

$result=(mysqli_query($conn, $sql)); 

if ($result->num_rows>0 ) {
    echo '<script> alert("Account with the same email Already present")</script>';
    echo "<script> location.href='login-signup.php'; </script>";




 
 if ($date1->format("Y") > 2004)
{
    echo '<script> alert("You have to be more than the age of 16 to create account on the platform ")</script>';
    echo "<script> location.href='login-signup.php'; </script>";
}
else if ($password!=$repassword)
{
    echo '<script> alert("Both the input passwords do not match ")</script>';
    echo "<script> location.href='login-signup.php'; </script>";
}
}
else
{

$sql="INSERT INTO user_info (user_name,user_email,user_password,user_date,user_credit) VALUES ('$name','$email','$password','$date','$credit')";

if(mysqli_query($conn,$sql))
{


 echo '<script> alert(" Account Created ")</script>';
 echo "<script> location.href='login-signup.php'; </script>";
}
}

    exit;



?>