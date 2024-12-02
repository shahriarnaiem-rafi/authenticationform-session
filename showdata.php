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
            header("location:showdata.php");
        }
       }
       else{
        echo "please enter a file<br>";
       }
      
       echo "
       <img src='$img.$filename' alt='image'><br>";
    }    
    ?>

    
