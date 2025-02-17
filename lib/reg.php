<?php
require "db.php";


$user_name = trim(filter_var($_POST["user_name"], FILTER_SANITIZE_SPECIAL_CHARS));
$first_name = trim(filter_var($_POST["first_name"],FILTER_SANITIZE_SPECIAL_CHARS ));
$password = trim(filter_var($_POST["password"], FILTER_SANITIZE_SPECIAL_CHARS));


if(strlen($user_name) <= 3){
    echo "Error, username has to contain more than 3 symbols";
    exit;
};

if(strlen($first_name) <= 3){
    echo "Error, name has to contain more than 3 symbols";
    exit;
};


if(strlen($password) <= 3){
    echo "Error, password has to contain more than 3 symbols";
    exit;
};




$salt = "awirje21$!@#ifiijsf";
$password = md5($salt . $password);


$sql = 'INSERT INTO users(first_name, user_name, password) VALUES(?, ?, ?)';

$query = $pdo->prepare($sql);
$query->execute([$first_name, $user_name, $password]);
if ($query){
    echo "<p>YOU SIGNED UP SUCCESSFULLY</p>";
}else{
    echo "<p>ERROR</p>";
};

?>