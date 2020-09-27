<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/register.css" />
    <title>Register</title>	
</head>
<body>

<?php
    if(isset($_POST["submit"])) {
        require("connection.php");
        $stmt = $mysql->prepare("SELECT * FROM accounts WHERE USERNAME = :user"); //Username überprüfen
        $stmt->bindParam(":user", $_POST["username"]);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count == 0){ //Username ist frei
            if($_POST["pw"] == $_POST["pw2"]) {
                $stmt = $mysql->prepare("INSERT INTO accounts (USERNAME, PASSWORD) VALUES (:user, :pw)");
                $stmt->bindParam(":user", $_POST["username"]);
                $hash = password_hash($_POST["pw"], PASSWORD_BCRYPT);
                $stmt->bindParam(":pw", $hash);
                $stmt->execute();
                echo "Dein Account wurde angelegt";
            } else {
                echo "Die Passwörter stimmen nicht überein";
            }
        } else {
            echo "Der Username ist bereits vergeben";
        }
    }
?>

    <h1>Account erstellen</h1>
    <form action="register.php" method="post">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="text" name="email" placeholder="E-Mail"><br>
        <input type="password" name="pw1" placeholder="Passwort" required><br>
        <input type="password" name="pw2" placeholder="Passwort wiederholen" required><br>
        <button type="submit" name="submit">Erstellen</button>
    </form>
    <br>
    <a href="login.php">Hast du bereits einen Account?</a>

</body>
</html>


<!-- https://www.youtube.com/watch?v=VKiGDzsCnnE -->