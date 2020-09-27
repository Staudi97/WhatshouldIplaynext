<?php
$host = "192.168.64.2";
$name = "register";
$user = "root";
$passwort = "";

try{
    $mysql = new PDO("mysql:host=$host;dbname=$name", $user, $passwort);
} catch (PDOException $e){
    echo "SQL Error: ".$e->getMessage();
}

?>
