<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/output.css">
    <link rel="stylesheet" href="styles/input.css">
</head>
<body>
    <h1>Hello, WOrld!!))) <?php echo $_COOKIE["user_name"]?></h1>
    <?php
    require("lib/db.php");
    $sql = "SELECT * FROM users ORDER BY id DESC";
    $query = $pdo->prepare($sql);
    $query->execute();
    $users = $query->fetchAll(PDO::FETCH_OBJ);
    foreach($users as $user){
        echo '<p>' . $user->user_name . '</p>';
        echo '<p>' . $user->first_name . '</p>';
        echo "<p>$user->password}</p>";
        echo "\n";

    };
    ?>
</body>
</html>