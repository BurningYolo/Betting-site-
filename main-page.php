<?php

session_start(); 
include('connection.php'); 
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

    <title>Main Page</title>

   
    <style>
        body{
            background:grey; 
                
                }
                h2 {
                  font-size: 40px;
                 
                  
                }
                table 
            {
            border : white 2px solid ; 
            color : black ;
                background:white ;
      
            text-align: center ;  
            }  
            tr {
            border : rgb(13, 5, 233) 2px solid ; 
            color : black ;
                background:white ;
            }  
            td{
            border : black 2px solid ; 
            color : black ;
                background:white ;
            
            }
            th {
              
                font-size: 20px;
                border: black 2px solid ;
               color : black ;
                background:white ;
               
            }
            p
                {
                    
                 
                    font-size: 20px;
                
          
                }

    input[type=text]
        {
            background:transparent;
                    border: transparent;
                    text-align:center; 
            }
    input[type=number]
    {
  
    color: black;
    width: 110px;
    }

                input[type=submit]
    {
        color: rgb(10, 9, 10);
   
    }  
                

        </style>
</head>

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

<div class="container-fluid " >
<h2><center> CURRENT ONGOING GAMES <center></h2>

<center>
<?php
      
      include('connection.php');
      $sql="SELECT * FROM total_bets_info where status='ongoing' ";
      $x=(mysqli_query($conn,$sql));
      

      
      echo "<table>
      <tr>
<th>Bet on Team 1 </th>   
<th>Team 1 </th>
<th>Team 1 odds </th>   
<th>Team 2 </th>
<th>Team 2  odds </th>
<th>Status</th>
<th>Bet on Team 2 </th>"
;


while($row=mysqli_fetch_array($x)) 
{
    echo "<form action='user_betting_registration.php'  method='post'>";
?>

<tr>

<td><?php echo "<input type='submit' name='submit1' value='BET'  /> <input type=number name=betting_credit1 placeholder=credit-here /> "?></td>
<td><p><?php echo "<input type='text'  name='team1' readonly value='{$row['team1']}' />"; ?><p></td>
<td><p><?php echo "<input type='text'  name='team1_odds' readonly value='{$row['team1_odds']}' />"; ?><p></td>
<td><p><?php echo "<input type='text'  name='team2' readonly value='{$row['team2']}' />"; ?><p></td>
<td><p><?php echo "<input type='text'  name='team2_odds' readonly value='{$row['team2_odds']}' />"; ?><p></td>
<td><p><?php echo "<input type='text'  name='status' readonly value='{$row['status']}' />"; ?><p></td>
<td><?php echo "<input type='submit' name='submit2' value='BET'  /> <input type=number name=betting_credit2 placeholder=credit-here /> "?></td>
<?php echo "</form>" ; 
?>

</tr>




<?php
}
echo "</table>";
?>
</div>

  
    



        
</body>
</html>