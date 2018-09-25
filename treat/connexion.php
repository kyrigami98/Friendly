<?php

try {
    $login = "root";
    $pass = "";
    $server = "localhost";
    $connect = new PDO("mysql:host=$server;dbname=friendly", $login, $pass);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

?>