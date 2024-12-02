<?php
session_start();
if(isset($_POST["submitted"])){
    $username=$_POST['name'];
    $password=$_POST['password'];

    if($username== "Rafi" && $password== "1234"){
        $_SESSION["session-create"]=$password;
        header("location:loggedin.php");
    }
    else{
        echo "invalid name&passs";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <form action="" enctype="multipart/form-data" method="post">
        <label for="">User Name</label>
        <input type="text" name="name" placeholder="enter your name"><br>
        <label for="">Password</label>
        <input type="text" name="password" placeholder="enter your password" ><br><br>
        <input type="submit" value="Submit" name="submitted">
    </form>
    
</body>
</html>