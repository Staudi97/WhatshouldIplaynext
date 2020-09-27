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
    }
?>

    <h1>Einloggen</h1>
    <form action="login.php" method="post">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="pw1" placeholder="Passwort" required><br>
        <button type="submit" name="submit">Einloggen</button>
    </form>
    <br>
    <a href="register.php">Noch keinen Account?</a>

</body>
</html>