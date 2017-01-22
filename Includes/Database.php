<?php    
    
    
        
        $databaseConfig['dbHost'] = "localhost";
        $databaseConfig['dbUser'] = "root";
        $databaseConfig['dbPwd'] = "";
        $databaseConfig['dbName'] = "blogappmasterdb";

        foreach($databaseConfig as $key => $value){
    
        define(strtoupper($key), $value);
    
        }
        
        $connection = mysqli_connect(DBHOST, DBUSER, DBPWD, DBNAME);
        
        
       

    
    





//    $username = $_POST['username'];    
//    $password = $_POST['password'];
//    
//    
//    $username = mysqli_real_escape_string($connection, $username);
//    $password = mysqli_real_escape_string($connection, $password);
//    
//    $hashFormat =  "$1$";
//    $salt = "idonotknow49";    
//    $hashAndSalt = $hashFormat . $salt;    
//    $password = crypt($password, $hashAndSalt);




?>