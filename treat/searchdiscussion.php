<?php

include_once("connexion.php");
if (isset($_GET["pseudo"])) {


    $sql = $connect->prepare('SELECT * FROM discussion WHERE (user2 LIKE :imat)');
    $sql->bindValue(':imat', "%".$_GET["pseudo"]."%");
    $sql->execute();
    $tab = $sql->fetchall();
    $result = "";
    if ($tab != NULL) {//s'il n'y ait pas on l'enreghiTre
        foreach ($tab as $value) {
            if ( ($value["user"]) == ($_GET["pseudo"]) ) {
                            $result .= '  <li class="contact">
                            <div class="wrap">
                                <span class="contact-status online"></span>
                                <img src="img/shoes.jpg" alt="" />
                                <div class="meta">
                                    <p class="name">' . $value["user2"] . '</p>
                                </div>
                            </div>
                        </li>
            ';
            }else{
                            $result .= '  <li class="contact">
                            <div class="wrap">
                                <span class="contact-status online"></span>
                                <img src="img/shoes.jpg" alt="" />
                                <div class="meta">
                                    <p class="name">' . $value["user"] . '</p>
                                </div>
                            </div>
                        </li>
            ';
            }

        }
    } else {
        $result .= ' <button type="button" class="btn btn-secondary btn-block">Aucun résultat</button>';
    }
    //die(var_dump($result));
    echo $result;
}

