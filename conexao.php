<?php

$localhost = "localhost";
$username = "root";
$password = "";
$db = "bdavaliacao";

try {
    $con = new PDO("mysql:host=$localhost;dbname=$db",$username,$password);
} catch(PDOException $e) {
    echo "Erro: " .$e -> getMessage();
}