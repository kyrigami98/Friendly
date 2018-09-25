<?php

session_start();
include_once("connexion.php");

$pseudo1 = ($_SESSION['pseudo']);
$pseudo2 = ($_GET['pseudo']);

$sql = $connect->prepare('SELECT * FROM discussion WHERE (user=:pseudo1 AND user2=:pseudo2) OR (user=:pseudo2 AND user2=:pseudo1)');
$sql->bindValue(':pseudo1', $pseudo1);
$sql->bindValue(':pseudo2', $pseudo2);
$sql->execute();
$tab = $sql->fetchall();
//var_dump($tab);
//var_dump($pseudo1);
//die(var_dump($pseudo2));
if ($tab != NULL) {//s'il n'y ait pas on l'enreghiTre
    echo ' <button type="button" class="btn btn-secondary btn-block">Vous discutez déjà avec ' . $pseudo2 . ' !</button>';
} else {
    $sql1 = $connect->prepare('INSERT INTO discussion(user,user2) VALUES(?,?)');
    $sql1->execute(array($pseudo1, $pseudo2));
      echo ' <button type="button" class="btn btn-secondary btn-block">Vous discutez déjà avec ' . $pseudo2 . ' !</button>';

}


