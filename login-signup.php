<?php

session_start(); 
include('connection.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>


   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Signup</title>

    <style>
        body{
            background : grey ;

	
font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;





}
*,:after,:before{box-sizing:border-box}
.clearfix:after,.clearfix:before{content:' ';display:f}
.clearfix:after{clear:both;display:block}
a{color:inherit;text-decoration:none}

.login-wrap{
width:100%;
margin:auto;
max-width:700px;
min-height:800px;
position:relative;



}
.login-html{
width:100%;
height:100%;
position:absolute;
padding:90px 70px 50px 70px;



}
.login-html .sign-in-htm,
.login-html .sign-up-htm{
top:0;
left:0;
right:0;
bottom:0;
position:absolute;
transform:rotateY(180deg);
backface-visibility:hidden;
transition:all .6s linear;
}
.login-html .sign-in,
.login-html .sign-up,
.login-form .group .check{
display:none;
}
.login-html .tab,
.login-form .group .label,
.login-form .group .button{
text-transform:uppercase;
}
.login-html .tab{
font-size:25px;
margin-right:15px;
padding-bottom:5px;

display:inline-block;
border-bottom:2px solid transparent;
}
.login-html .sign-in:checked + .tab,
.login-html .sign-up:checked + .tab{

border-color:#33df5b;
color : white ; 

}
.login-form{

position:relative;
}
.login-form .group{
margin-bottom:15px;
}
.login-form .group .label,
.login-form .group .input,
.login-form .group .button{
margin-top : 10px;
width:100%;




display:block;
}
.login-form .group .input,
.login-form .group .button{
border:none;
padding:15px 20px;
color: rgb(0, 0, 0);


}

.login-form .group .label{

font-size:14px;
}
.login-form .group .button{

font-size: 25px;
margin-top: 40px;
color: black;

}

.login-form .group .button :hover{
cursor: pointer;


}

.login-form .group label .icon{
width:15px;
height:15px;
border-radius:2px;
position:relative;
display:inline-block;
background:white ;
}
.login-form .group label .icon:before,
.login-form .group label .icon:after{
content:'';
width:10px;
height:2px;

position:absolute;
transition:all .2s ease-in-out 0s;
}
.login-form .group label .icon:before{
left:3px;
width:5px;
bottom:6px;
transform:scale(0) rotate(0);
}
.login-form .group label .icon:after{
top:6px;
right:0;
transform:scale(0) rotate(0);
}
.login-form .group .check:checked + label{
transition:all .2s ease-in-out 0s;

}
.login-form .group .check:checked + label .icon{
background:#101318;
}
.login-form .group .check:checked + label .icon:before{
transform:scale(1) rotate(45deg);
}
.login-form .group .check:checked + label .icon:after{
transform:scale(1) rotate(-45deg);
}
.login-html .sign-in:checked + .tab + .sign-up + .tab + .login-form .sign-in-htm{
transform:rotate(0);
}
.login-html .sign-up:checked + .tab + .login-form .sign-up-htm{
transform:rotate(0);
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
    <form  action= "login_backend.php" method="POST">
     
    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab"> Login</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
            <div class="login-form">
                <div class="sign-in-htm">
                    <div class="group">
                        
                        <label for="user" class="label">Email</label>
                        <input id="email" name="email" type="email" required class="input">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Password</label>
                        <input id="pass" name="password" type="password" class="input" required  data-type="password">
                    </div>
                    
                    <div class="group">
                        <input type="submit" class="button" value="Login">
                    </div>
                    <div class="hr"></div>
                   
                </div>
            </form>
                <div class="sign-up-htm">
                    <form  action= "signup_backend.php" method="POST">
                    <div class="group">
                        <label for="name" class="label">Username</label>
                        <input id="user" type="text" name="name" required  class="input">
                    </div>
                    <div class="group">
                        <label for="email" class="label">Email Address</label>
                        <input id="email" name="email" type="email" required class="input">
                    </div>
                    <div class="group">
                        <label for="date" class="label">Date of Birth</label>
                        <input id="user" type="date" name="date"required  class="input">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Password</label>
                        <input id="pass" type="password" class="input"name="password"required  data-type="password">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Repeat Password</label>
                        <input id="pass" type="password" class="input"name="repassword" required data-type="password">
                    </div>
                   
                    <div class="group">
                        <input type="submit" class="button" value="Sign Up">
                    </div>
                    <div class="hr"></div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
    
</body>
</html>