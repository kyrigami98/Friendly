<?php

session_start();
include_once("connexion.php");
//die(var_dump($_POST['pane']));

if (isset($_POST['pseudo']) && isset($_POST['password']) && $_POST['pseudo'] != '' && $_POST['password'] != '') { //isset verifie si quelque chose existe
    $pseudo = ($_POST['pseudo']);
    $password = sha1($_POST['password']);

    //die(var_dump($pane));
    $sql = $connect->prepare('SELECT * FROM users WHERE (pseudo=:pseudo AND pass=:password)');

    $sql->bindValue(':pseudo', $pseudo);
    $sql->bindValue(':password', $password);
    $sql->execute();
    $tab = $sql->fetchall();
    if ($tab != NULL) {//si authentification reussi
        $_SESSION["id"] = $tab[0]["id"];
        $_SESSION["pseudo"] = $tab[0]["pseudo"];
        header('location:../chat.php');
        exit;
    } else {
       $_SESSION["message"] = "Echec d'authentification";
        header('location:../index.html');
        exit;
    }
}else {
        $_SESSION["message"] = "Echec d'authentification";
        header('location:../index.html');
        exit;
    }
?>

