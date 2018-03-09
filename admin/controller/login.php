<?php
    if(isset($_POST["Login"])){
        include "dbconfig.php";
        session_start();
        
         $email=mysqli_real_escape_string($connection, $_POST['email']);
         $password=md5(mysqli_real_escape_string($connection,$_POST['password'])); 
         $query = "SELECT * FROM user WHERE email='$email' AND password='$password'";
         $result=mysqli_query($connection,$query);
         $count=mysqli_num_rows($result);
        
        if($count >0){
             $row=mysqli_fetch_array($result);
                
            $_SESSION['admin']=$row['id']; 
            $_SESSION['name_user']=$row['name']; 
            
            
        }
        header("location: ../index.php");
    }

?>