<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Admin-Page</title>
    <style>
    body

    {
        background-color:grey; 
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
</head>
<body>
<center><h1 style="text-decoration : underline">Admin Page</h1>
<div class="container-fluid" >
  <div class="row">
    <div style="border:white 2px solid"class="col" >
   
   <center> <h2>Generate a Bet on front Page </h2>
   <form action="add-bet.php" method="post">
   <label for="team1">Team 1 </label>
   <br>
   <input type="text" name="team1"> 
   <br>
   <label for="team1_odds">Team1 Odds  </label>
   <br>
   <input type="number" min="0" max="0.9"step="0.1" name="team1_odds"> 
   <br>
   <label for="team2">Team 2 </label>
   <br>
   <input type="text" name="team2"> 
   <br>
   <label for="team2_odds">Team2 Odds  </label>
   <br>
   <input type="number" min="0" max="0.9"step="0.1" name="team2_odds"> 
   <br>
   <br>
   <input type="submit" value = "Add Bet ">



   </form>
    
    

    </div>
    <div style="border:white 2px solid" class="col" >
   <center><h2>Search for any user  </h2>
   <form action="search-user.php" method = "post">
  <label for="options">Search by :</label>
  <select name="options" >
    <option value="Email">Email</option>
    <option value="Username">Username</option>
    <option value="ID">ID</option>
  </select>
  
  <br>
  <input name="input" type="text " placeholder="Input Text here ">
  <br><br>
  <input type="submit" value="Search">
</form>

  
   
    </div>
    <div style="border:white 2px solid" class="col" >
   <center><h2>Register a User </h2>
   <form  action= "admin-signup_backend.php" method="POST">
               
                  <label for="name" >Username</label>
                  <br>
                 <input  type="text" name="name" required  >
                 <br>
                        
    
              <label for="email" >Email Address</label>
              <br>
                   <input name="email" type="email" >
                   <br>
                    
                        
              <label for="date">Date of Birth</label>
              <br>
          <input  type="date" name="date"required >
          <br>
                        
                        
              <label for="pass" class="label">Password</label>
              <br>
              <input type="password" name="password"required  data-type="password">
              <br>
                        
                        
                 <label for="pass" class="label">Repeat Password</label>
                 <br>
             <input id="pass" type="password" class="input"name="repassword" required data-type="password">
             <br>
             <br>
             <input type="submit" value="Register">
             </form>
             <br>  <br>
                    
            
    
    </div>
    <div style="border:white 2px solid" class="col" >
    <center><h2>Delete a User </h2>
    <form action="delete-user.php" method="post">
    <label for="id" >Please Enter User_id of user to be Deleted</label>
                  <br>
                 <input  type="number" name="id" required  min="0">
                 <br>
                 <br>
                 <input type="submit" value="Delete" >
      </form>
                        

    </div>
  </div>
</div>

<div class="container">
<center><h2>GENERATE RESULT </h2>
<form action="generate-result.php" method="post">



<label for="team1" >Team 1 (Winner)</label>
<br>
<input type="text" name="team1" required> 
<br>
<label for="team2" >Team 2 (Looser)</label>
<br>
<input type="text" name="team2" required> 
<br>
<br>
<input type="submit" value="Generate Result">
</form>
<br>
<br>






</div>

    



          
      
      





    
</body>
</html>