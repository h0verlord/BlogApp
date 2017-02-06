<?php

$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "blogappmasterdb";

foreach ($db as $key => $value)
{
	define(strtoupper($key), $value);
}


$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($connection){
}


//class Database{

    //public static $connection;

    //public function connect() {
    //    // Try and connect to the database
    //    if(!isset(self::$connection)) {

    //        $dbHost= "localhost";
    //        $dbUser= "root";
    //        $dbPwd= "";
    //        $dbName = "blogappmasterdb";

    //        self::$connection = new mysqli($dbHost,$dbUser,$dbPwd,$dbName);
    //    }
    //    // If connection was not successful, handle the error
    //    if(self::$connection === false) {
    //        // Handle error - notify administrator, log to a file, show an error screen, etc.
    //        return false;
    //    }
    //    return self::$connection;
    //}
    ///**
    // * Query the database
    // *
    // * @param $query string the query string
    // * @return mixed The result of the mysqli::query() function
    // */
    //public function query($query) {
    //    // Connect to the database
    //    $connection = self::connect();

    //    // Query the database
    //    $result = $connection -> query($query);

    //    return $result;
    //}

    //public function select($query) {
    //    $rows = array();
    //    $result = self::query($query);

    //    if($result === false) {
    //        return false;
    //    }
    //    while ($row = $result -> fetch_assoc()) {
    //        $rows[] = $row;
    //    }
    //    return $rows;
    //}

    //public function error() {
    //    $connection = self::connect();
    //    return $connection -> error;
    //}

    ///**
    // * Quote and escape value for use in a database query
    // *
    // * @param string $value The value to be quoted and escaped
    // * @return string The quoted and escaped string
    // */
    //public function quote($value) {
    //    $connection = self::connect();
    //    return "'" . $connection -> real_escape_string($value) . "'";
    //}
//}




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