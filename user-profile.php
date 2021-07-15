<?php
session_start(); 
include('connection.php'); 

$id=$_SESSION['session']; 

if(isset($_SESSION['session'])){
$sql="SELECT * FROM user_info WHERE user_id='$id' ";
$x=(mysqli_query($conn,$sql));
while($row=mysqli_fetch_array($x))
{
    $user_name_1 = $row['user_name']; 
    $user_email_1 = $row['user_email']; 
    $user_credit_1 = $row['user_credit']; 
    $user_date_1 = $row['user_date']; 
}
?>

<!DOCTYPE html>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
   
    <title>User Profile </title>
</head>
<style>
  body{
                
	
                font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                background-color: grey;
          

                
                }
                p
                {
                 
                    font-size: 21px;
  
                }
            

h2 {
  font-size: 40px;

  
}
p2
{
    font-size: 18px;
 

}
label
{
    font-size: 20px;


}
.input
{

}
input[type=number]
{
  

} 
input[type=submit]
{
    
}  
table 
{
  border : white 2px solid ; 
  width : 100%;
  text-align: center ;  
  color:black ; 
  background-color:white; 
}  
tr {
  border : black 2px solid ; 
}  
td{
  border : black 2px solid ; 

}



</style>
<body>

<nav class="navbar navbar-expand-md bg-dark  " >
        <img class="navbar-brand" src="website-images/nav1.png" style="height: 80px;">
        <h1 class="navbar-brand" style="font-style: italic; color: aliceblue; font-size: 40px;">Soccer Betting </h1>
        <img class="navbar-brand" src="website-images/nav2.png" style="height: 80px;">
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon" style="margin-bottom:50px"><img style="height: 70px;"src="website-images/button.png"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a style="color: white; font-size: 25px ; margin-left: 50px;"href="main-page.php" class="nav-item nav-link  ">HOME</a>
                <a style="color: white; font-size: 25px;margin-left: 50px;"href="login-signup.php" class="nav-item nav-link">LOGIN-SIGNUP</a>
              
                <?php
                if(isset($_SESSION['session'])){
                $id=$_SESSION['session']; 
              include('connection.php');
              $sql="SELECT user_name FROM user_info WHERE user_id='$id' ";
              $x=(mysqli_query($conn,$sql));
              while($row=mysqli_fetch_array($x))
              {
      
              ?>
              <a style="color : white ; font-size: 25px;margin-left: 300px; " href="user-profile.php" class="nav-item nav-link"><?php echo "    " , $row['user_name']; ?></a>
              <a style="color : white ;border : 2px white solid; font-size: 15px; margin-top : 10px;" href="logout.php" class="nav-item nav-link"> LOGOUT </a>
              <?php
              }}
              else if (!isset($_SESSION['session']))
              {
                ?>
                
                  <a style="color: white; font-size: 25px;margin-left: 300px;border:white 2px solid "href="login-signup.php" class="nav-item nav-link">LOGIN</a>
               <?php

              }
              ?>

            
            </div>
           
        </div>
    </nav>
</div>

<div class="container-fluid" >
  <div class="row">
    <div class="col" >
    <center><h2>USER INFORMATION </h2>
        <br> 

    <p><?php echo  "USERNAME : " ,  $user_name_1 ?></p>
    <p><?php echo  "EMAIL : " ,  $user_email_1 ?></p>
    <p><?php echo  "DATE OF BIRTH : " ,  $user_date_1 ?></p>
    <p><?php echo  "CREDIT : " ,  $user_credit_1 ?></p>
    

    </div>
    <div class="col-6" >
    <center><h2>UPDATE PANEL </h2></center>
    <center>
    <?php

$sql="SELECT * FROM user_info WHERE user_id='$id' ";
      $x=(mysqli_query($conn,$sql));

      while($row=mysqli_fetch_array($x)) {
      
        echo "<form action='update-user-info.php'  method='post'>";
        echo "<p2>Input Values to update in this Form</p2>";
        echo "<br/>";
        echo "<label>" . "Username:" . "</label>" . "<br />";
        echo"<input class='input' type='text' name='name' value='{$row['user_name']}' />";
        echo "<br />";
        echo "<label>" . "Email:" . "</label>" . "<br />";
        echo"<input class='input' type='email' name='email' value='{$row['user_email']}' />";
        echo "<br />";
        echo "<label>" . "Date of Birth:" . "</label>" . "<br />";
        echo"<input class='input' type='text' name='date' value='{$row['user_date']}' />";
        echo "<br />";
        echo "<br />";
        
        echo "<input type='submit' name='submit' value='UPDATE'  />";
        echo "<br />";
        echo "<br />";
        echo "<br />";
        echo "</form>";
          
      }
      

?>





    </div>
    <div class="col" >
    <center><h2>ADD CREDIT</h2></center>
    <center>
        <br>
    <p><?php echo "MAX INPUT CREDIT LIMIT   : 5000 " ?> </p>
    <p><?php echo  "CURRENT CREDIT    : " ,  $user_credit_1 ?></p>
    <br>
    <center><form  action= "add_credit.php" method="POST">
    <label for="credit" class="label">Add amount to be added below </label>
    <br>
    <input type="number" name="credit" hint="Add amount to be added here"> </input>
    <br>
    <br>
    <input type='submit' name='submit' value='ADD CREDIT'  />
    </from>


    
    
    
    </div>
  </div>
</div>
<div class="container">
    <center><h2>ALL USER BETTING INFORMATION</h2></center>

<center>
    <?php
      
      include('connection.php');
      $sql="SELECT * FROM betting_info where user_id = '$id' ";
      $x=(mysqli_query($conn,$sql));

      
      echo "<table width='500'>
      <tr>
<th><p>Betting ID <p></th>
<th><p>Team 1<p> </th>
<th><p>Team 2 <p></th>
<th><p>Betting Credit<p> </th>
<th><p>Status<p></th>";


while($row=mysqli_fetch_array($x)) 
{
?>
<tr>
<td><p><?php echo $row['betting_id']; ?><p></td>
<td><p><?php echo $row['betting_team1']; ?><p></td>
<td><p><?php echo $row['betting_team2']; ?><p></td>
<td><p><?php echo $row['betting_credit']; ?><p></td>
<td><p><?php echo $row['betting_status']; ?><p></td>

</tr>


<?php
}
echo "</table>";
}
else 
{
  echo '<script> alert("Pta tha yhi poochein gy sir :D    ")</script>';
  echo "<script> location.href='login-signup.php'; </script>";
}
?>

  
    
    
    
  







</div>



 



    

    
</body>
</html>