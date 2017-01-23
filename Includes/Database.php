<?php  
    class Database{
        
        public $connection;
        
        public function __construct(){
                $dbHost= "localhost";
                $dbUser= "root";
                $dbPwd= "";
                $dbName = "blogappmasterdb";     
            
            if(!$this->connection){
                
                $this->connection = new mysqli($dbHost, $dbUser, $dbPwd, $dbName);

            }           
                
        }           

    }


    
        
        
        
        
       

    
    





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