<?php 
    session_start();
    if(!isset($_SESSION["session-create"])){

        header("location:index.php");
    }

    if(isset($_POST["submitted"])){
        $name=$_POST['name'];
        $email=$_POST['email'];
       $emailNan="/^[a-z0-9]+@[a-z]+\.[a-z]{2,4}/";
       

       $filename=$_FILES["my-file"]["name"];
       $temp=$_FILES["my-file"]["tmp_name"];
       $size=$_FILES["my-file"]["size"];
       $kb=100*1024;
       $img="img/";
       

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data </title>
</head>
<body>
<form action="" enctype="multipart/form-data" method="post">
        <label for=""> Name</label>
        <input type="text" name="name" placeholder="enter your name"><br>
        <label for="">Email</label>
        <input type="text" name="email" placeholder="enter your email" ><br>
        <label for="">Uplode picture</label>
        <input type="file" name="my-file"><br><br>
        <input type="submit" value="Submit" name="submitted">
        <a href="logout.php">logout</a>

    </form>
    
    <?php
   
   if(isset($_POST["submitted"])){
    //email check
    if(!(preg_match($emailNan,$email))){
        echo "email in invalid<br>";

       }
       else{
        echo "the  email $email <br>";
       }
       //IMAGE CHEKD

       if(!empty($filename)){
        if($size>$kb){
            $img= "img/";
            echo "image wil be lower than 100kb<br>";
        }
        else{
            $img= "img/";
            move_uploaded_file("$temp","$img.$filename");
            echo "sucessfully uploaded<br>";
        }
       }
       else{
        echo "please enter a file<br>";
       }
       echo "
        <img src='$img.$filename' alt='image'><br>";

    }    
    ?>
</body>
</html>