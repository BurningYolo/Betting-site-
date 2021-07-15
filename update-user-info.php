<?php 
session_start(); 
$id=$_SESSION['session']; 
include('connection.php'); 

$email=$_POST['email']; 
$date=$_POST['date']; 
$name=$_POST['name']; 






$sql="SELECT * from user_info where user_id !='$id' ";

$result=(mysqli_query($conn, $sql)); 

while($row=mysqli_fetch_array($result)) {

    if($row['user_email'] == $email)
    {
        echo '<script> alert("Account with the entered email Already present in the database")</script>';
        echo "<script> location.href='user-profile.php'; </script>";
        exit;

    }
    }

    
        $sql="UPDATE user_info set user_name='$name' , user_email= '$email' , user_date = '$date' where user_id ='$id' ";
        $result=(mysqli_query($conn, $sql));  
        if($result)
        {
            echo '<script> alert("Accout Information Successfully Updated")</script>';
            echo "<script> location.href='user-profile.php'; </script>";

        }

    

  






?>