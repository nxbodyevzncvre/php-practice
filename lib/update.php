<?php
require "db.php";

$old_password = trim(filter_var($_POST["old_password"], FILTER_SANITIZE_SPECIAL_CHARS));
$new_password = trim(filter_var($_POST["new_password"], FILTER_SANITIZE_SPECIAL_CHARS));


if(strlen($old_password) < 3){
    echo "ERROR";
    exit;
}
if(strlen($new_password) < 3){
    echo "error";
    exit;

}

$salt = "awirje21$!@#ifiijsf";
$password = md5($salt . $old_password);

$check = 'SELECT * FROM users WHERE user_name = ? AND password = ?';
$query_check = $pdo->prepare($check);
$query_check->execute([$_COOKIE["user_name"], $password]);

if($query_check->rowCount() == 0){
    echo "ERROR, NOT RIGHT";
    $canwe = FALSE;
    exit;

}else{
    $canwe = TRUE;

}

if($canwe){
    $sql = "UPDATE users SET password= ? WHERE user_name = ?";
    $query = $pdo->prepare($sql);
    $new_hashed_password = md5($salt . $new_password);
    $query->execute([$new_hashed_password, $_COOKIE["user_name"]]);
    if($query->rowCount() != 0){
        echo "Success";
    }else{
        echo "Error";
    }
}


?>