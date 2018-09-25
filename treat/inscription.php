<?php

session_start();
include_once("connexion.php");
//die(var_dump($_POST['pseudo']));
if (isset($_POST['pseudo']) && isset($_POST['password']) && $_POST['pseudo'] != '' && $_POST['password'] != '') { //isset verifie si quelque chose existe
    $pseudo = ($_POST['pseudo']);
    $password = sha1($_POST['password']);

    //on recherche l'id de l'user
    $q = $connect->prepare('SELECT * FROM users WHERE pseudo=:idEnr');
    $q->execute(array(':idEnr' => $pseudo));
    $tab = $q->fetchall();
    //die(var_dump($tab));
    if (!$tab) {
        $sql = $connect->prepare('INSERT INTO users(pseudo,pass) VALUES(?,?)');
        $sql->execute(array($pseudo, $password));

        $id = $connect->prepare('SELECT * FROM users WHERE pseudo=:idEnr');
        $id->execute(array(':idEnr' => $pseudo));
        $tab1 = $id->fetchall();

        $_SESSION["id"] = $tab1[0]["id"];
        $_SESSION["pseudo"] = $tab1[0]["pseudo"];
        header('location:../chat.php');
        exit;
    } else {
        $_SESSION["message"] = "Echec d'authentification";
        //header('location:../index.html');
        exit;
    }
} else {
    $_SESSION["message"] = "Renseigrer tout les champs s'il vous plait";
    header('location:../index.html');
    exit;
}
?>

