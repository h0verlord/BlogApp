<?php

if(isset($_POST['submit'])){
       
    $connection = mysqli_connect('localhost', 'root', '', 'blogappmasterdb');

    if($connection){        
        echo "connected";
    } else {        
        die("failed");
    }
   
    $username = $_POST['username'];    
    $password = $_POST['password'];
    
    
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);
    
    $hashFormat =  "$1$";
    $salt = "idonotknow49";    
    $hashAndSalt = $hashFormat . $salt;    
    $password = crypt($password, $hashAndSalt);  
    
    $query = "INSERT INTO users(username,password) ";
    $query .= "VALUES ('$username', '$password')";
    
    $result = mysqli_query($connection, $query);
    
    if(!$result){
        
        die("Query failed" . mysqli_error());
    }
    
    
//    if($username && $password){
//        
//        echo $username . "<br />";
//        echo $password;
//    }
//    else
//    {
//        echo "username or password not set";            
//    }
    
    
    
    
    
    
    
    
    
}


?>


