<?php
session_start();
if(isset($_POST["submitted"])){
    $username = $_POST['name'];
    $password = $_POST['password'];

    if($username == "Rafi" && $password == "1234"){
        $_SESSION["session-create"] = $password;
        header("location:loggedin.php");
    }
    else{
        echo "<p style='color: red; font-weight: bold;'>Invalid name & password</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            font-size: 16px;
            color: #555;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .error {
            color: red;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="" enctype="multipart/form-data" method="post">
            <label for="name">User Name</label>
            <input type="text" name="name" placeholder="Enter your name" required><br>

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Enter your password" required><br><br>

            <input type="submit" value="Submit" name="submitted">
        </form>
    </div>
</body>
</html>
