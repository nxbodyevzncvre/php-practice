<?php
require "db.php";

$user_name = trim(filter_var($_POST["user_name"], FILTER_SANITIZE_SPECIAL_CHARS));
$password = trim(filter_var($_POST["password"], FILTER_SANITIZE_SPECIAL_CHARS));

if(strlen($user_name) < 3){
    echo "ERROR, NAME HAS TO CONTAIN MORE THAN 3 CHARS";
    exit;
};
if(strlen($password) < 3){
    echo "ERROR, PASSWORD HAS TO CONTAIN MORE THAN 3 CHARS";
    exit;
};




$salt = "awirje21$!@#ifiijsf";
$password = md5($salt . $password);



$sql = "SELECT id FROM users WHERE user_name= ? AND password = ?";
$query = $pdo->prepare($sql);
$query->execute([$user_name, $password]);

if($query->rowCount() == 0){
    echo "error";
    exit;
}else{
    setcookie("user_name", $user_name, time() + 3600 * 24 * 30, "/");

    header("Location: /test-proj/");
};




?>