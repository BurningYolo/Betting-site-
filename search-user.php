<?php
include('connection.php'); 
$options=$_POST['options']; 
$input = $_POST['input']; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

<center>
<?php
if ($options == "Email")
{
    echo "<h1>Searching by Email = </h1> "; 
    echo "<h1>$input</h1>" ; 
    $sql = "SELECT * FROM user_info where user_email = '$input' " ; 
    $result=(mysqli_query($conn,$sql));
    if($result)
    {
        while($row=mysqli_fetch_array($result)) {
            echo "<form action='admin-update-user-info.php'  method='post'>";
            echo "<p2>Updatable Infromation</p2>";
            echo "<br/>";
            echo "<label>" . "Username:" . "</label>" . "<br />";
            echo"<input class='input' type='text' name='name' value='{$row['user_name']}' />";
            echo "<br />";
            echo "<label>" . "Email:" . "</label>" . "<br />";
            echo"<input class='input' type='email' name='email' value='{$row['user_email']}' />";
            echo "<br />";
            echo "<label>" . "Date of Birth:" . "</label>" . "<br />";
            echo"<input class='input' type='text' name='date' value='{$row['user_date']}' />";
            echo "<br/>";
            echo "<label>" . "ID:" . "</label>" . "<br />";
            echo"<input class='input' type='number' name='id' readonly value='{$row['user_id']}' />";
            echo "<br />";
            echo "<br />";
            echo "<br />";
            echo "<input type='submit' name='submit' value='UPDATE'  />";
            echo "<br />";
            echo "<br />";
            echo "<br />";
            echo "</form>";

}

}}


else if ($options =="Username")
{

    echo "<h1>Searching by Username = </h1> "; 
    echo "<h1>$input</h1>" ; 
    $sql = "SELECT * FROM user_info where user_name = '$input' " ; 
    $result=(mysqli_query($conn,$sql));
    if($result)
    {
        while($row=mysqli_fetch_array($result)) {
            echo "<form action='admin-update-user-info.php'  method='post'>";
            echo "<p2>Updatable Infromation</p2>";
            echo "<br/>";
            echo "<label>" . "Username:" . "</label>" . "<br />";
            echo"<input class='input' type='text' name='name' value='{$row['user_name']}' />";
            echo "<br />";
            echo "<label>" . "Email:" . "</label>" . "<br />";
            echo"<input class='input' type='email' name='email' value='{$row['user_email']}' />";
            echo "<br />";
            echo "<label>" . "Date of Birth:" . "</label>" . "<br />";
            echo"<input class='input' type='text' name='date' value='{$row['user_date']}' />";
            echo "<br/>";
            echo "<label>" . "ID:" . "</label>" . "<br />";
            echo"<input class='input' type='number' name='id' readonly value='{$row['user_id']}' />";
            echo "<br />";
            echo "<br />";
            echo "<br />";
            echo "<input type='submit' name='submit' value='UPDATE'  />";
            echo "<br />";
            echo "<br />";
            echo "<br />";
            echo "</form>";

}

}
    

}
else if($options == "ID")
{
    echo "<h1>Searching by ID = </h1> "; 
    echo "<h1>$input</h1>" ; 
    $sql = "SELECT * FROM user_info where user_id = '$input' " ; 
    $result=(mysqli_query($conn,$sql));
    if($result)
    {
        while($row=mysqli_fetch_array($result)) {
            echo "<form action='admin-update-user-info.php'  method='post'>";
            echo "<p2>Updatable Infromation</p2>";
            echo "<br/>";
            echo "<label>" . "Username:" . "</label>" . "<br />";
            echo"<input class='input' type='text' name='name' value='{$row['user_name']}' />";
            echo "<br />";
            echo "<label>" . "Email:" . "</label>" . "<br />";
            echo"<input class='input' type='email' name='email' value='{$row['user_email']}' />";
            echo "<br />";
            echo "<label>" . "Date of Birth:" . "</label>" . "<br />";
            echo"<input class='input' type='text' name='date' value='{$row['user_date']}' />";
            echo "<br/>";
            echo "<label>" . "ID:" . "</label>" . "<br />";
            echo"<input class='input' type='number' name='id' readonly value='{$row['user_id']}' />";
            echo "<br />";
            echo "<br />";
            echo "<br />";
            echo "<input type='submit' name='submit' value='UPDATE'  />";
            echo "<br />";
            echo "<br />";
            echo "<br />";
            echo "</form>";

}

}
}

?>


    
</body>
</html>

