<?php

if(isset($_POST['login'])){

    $connection = mysqli_connect('localhost', 'root', '', 'blogappmasterdb');

    if($connection){

    } else {
        die("failed");
    }

    $username = $_POST['username'];
    $password = $_POST['password'];


    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    // $hashFormat =  "$1$";
    // $salt = "idonotknow49";
    // $hashAndSalt = $hashFormat . $salt;
    // $password = crypt($password, $hashAndSalt);

    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $selectUserQuery = mysqli_query($connection, $query);

    if(!$selectUserQuery){

        die("Query failed" . mysqli_error($connection));
    }


    while ($row = mysqli_fetch_array($selectUserQuery)) {
        $DBuserName = $row['username'];
        $passwd = $row['password'];
        $uId = $row['id'];

        echo "$userName";
    }
    if($username !== $DBuserName && $password !== $passwd){

        $message = "Username or Passwordf not correct";
        echo "<script type='text/javascript'>alert('$message');</script>";

        header("Location: index.php");
        
    }  elseif ($username == $DBuserName && $password == $passwd) {
        header ("Location: Admin/index.php");
    }
    else{
        header ("Location: index.php");

    }

}


?>


