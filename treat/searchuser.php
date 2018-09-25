<?php

session_start();
include_once("connexion.php");
if (isset($_GET["pseudo"])) {

    //var_dump($_SESSION["pseudo"]);
    $sql = $connect->prepare('SELECT * FROM users WHERE pseudo LIKE :imat');
    $sql->bindValue(':imat', "%" . $_GET["pseudo"] . "%");
    $sql->execute();
    $tab = $sql->fetchall();
    $result = "";
    if ($tab != NULL) {//s'il n'y ait pas on l'enreghiTre
        foreach ($tab as $value) {
            $result .= '<div class="meta"><hr/>
                                    <img id="" height="50" style="border-radius:50px;" src="img/shoes.jpg" class="online" alt="" />
                                    <b>@' . $tab[0]["pseudo"] . ' </b> 
                                    <button type="button" value="' . $tab[0]["pseudo"] . '" class="disc btn btn-primary pull-right">Lui ecrire!</button>
                                </div>
                      
            ';
        }
    } else {
        $result .= ' <button type="button" class="btn btn-secondary btn-block">Aucun résultat</button>';
    }
    //die(var_dump($result));
    echo $result;
}

