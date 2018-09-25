<?php

include_once 'connexion.php';

if (isset($_POST['pseudo']) && $_POST['message']) { // si on a envoyé des données avec le formulaire
    if (!empty($_POST['pseudo']) AND ! empty($_POST['message'])) { // si les variables ne sont pas vides
        $id = $_POST['pseudo'];
        $message = $_POST['message'];

        // puis on entre les données en base de données :
        $sql = $connect->prepare('INSERT INTO messages(id_expedi,contenu) VALUES(?,?)');
        $sql->execute(array($id, $message));
    } else {
        echo "Vous avez oublié de remplir un des champs !";
    }
}
?>

