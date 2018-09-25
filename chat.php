
<!DOCTYPE html>
<html lang="fr">

    <head>
        <!------ Include the above in your HEAD tag ---------->
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,300' rel='stylesheet' type='text/css'>

        <script>try {
                Typekit.load({async: true});
            } catch (e) {
            }</script>
        <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'><link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>


        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" type="image/png" href="img/logo.png">

        <title>Friendly</title>
        <link href="css/css_emoji/emoji.css" rel="stylesheet">
        <link href="vendor/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <script src="js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/simple-sidebar.css" rel="stylesheet">
        <link href="css/chat.css" rel="stylesheet">


        <style>
            #loader {
                z-index: 1001;
                height: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            #loader-wrapper{
                position: fixed;
                top: 0;
                width: 100%;
                height: 100%;
                background: #007bff;
                background-image:  url('');
                background-repeat:no-repeat;   
                background-size:cover;    
                z-index: 1000;
            }
            #loader-wrapper1{
                position: fixed;
                top: 0;
                width: 100%;
                height: 100%;
                background:rgba(0,0,0,0.7);  
                background-repeat:no-repeat;   
                background-size:cover;   
            }
            body {
                margin: 0;
                padding: 0;
                background-color: #007bff;
                background-repeat:no-repeat;   
                background-size:cover;    
                height: 100vh;
            }
            #login .container #login-row #login-column #login-box {
                margin-top: 120px;
                max-width: 600px;
                height: 420px;
                border: 1px solid #9C9C9C;
                background-color: white;
            }
            #login .container #login-row #login-column #login-box #login-form {
                padding: 20px;
            }
            #login .container #login-row #login-column #login-box #login-form #register-link {
                margin-top: -85px;
            }
        </style>

    </head>

    <body>

        <div id="loader-wrapper" class="">
            <div id="loader" class="">
                <img src="img/logo.png" height="100" alt="" />
            </div> 
        </div> 

        <div id="frame">
            <?php session_start(); ?>
            <div id="sidepanel">
                <div id="profile">
                    <div class="text-center">
                        <img class="" src="img/logo.png" height="60" alt="" />
                    </div>
                    <div class="wrap">
                        <img id="profile-img" src="img/shoes.jpg" class="online" alt="" />
                        <p>  <b>@<?= $_SESSION["pseudo"]; ?> </b> </p>
                        <i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>
                        <div id="status-options">
                            <ul>
                                <li id="status-online" class="active"><span class="status-circle"></span> <p>Online</p></li>
                                <li id="status-away"><span class="status-circle"></span> <p>Away</p></li>
                                <li id="status-busy"><span class="status-circle"></span> <p>Busy</p></li>
                                <li id="status-offline"><span class="status-circle"></span> <p>Offline</p></li>
                            </ul>
                        </div>
                        <div id="expanded">
                            <label for="twitter"><i class="fa fa-facebook fa-fw" aria-hidden="true"></i></label>
                            <input name="twitter" type="text" value="mikeross" />
                            <label for="twitter"><i class="fa fa-twitter fa-fw" aria-hidden="true"></i></label>
                            <input name="twitter" type="text" value="ross81" />
                            <label for="twitter"><i class="fa fa-instagram fa-fw" aria-hidden="true"></i></label>
                            <input name="twitter" type="text" value="mike.ross" />
                        </div>
                    </div>
                </div>
                <div id="search">
                    <label><i class="fa fa-search" aria-hidden="true"></i></label>
                    <input type="text" id="pseudo2" placeholder="Rechercher des contacts..." />
                </div>
                <div id="contacts">
                    <ul id="resultdisc">

                        <?php
                        include_once("treat/connexion.php");
                        if (isset($_SESSION["pseudo"])) {
                            $sql = $connect->prepare('SELECT * FROM discussion WHERE user=:imat OR user2=:imat');
                            $sql->bindValue(':imat', $_SESSION["pseudo"]);
                            $sql->execute();
                            $tab = $sql->fetchall();
                            $result = "";
                            if ($tab != NULL) {//s'il n'y ait pas on l'enreghiTre
                                foreach ($tab as $value) {
                                    if (($value["user"]) == ($_SESSION["pseudo"])) {
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
                                    } else {
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
                            echo $result;
                        }
                        ?>  

                    </ul>
                </div>
                <div id="bottom-bar">
                    <button id="addcontact" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i> <span>Ajouter contact</span></button>
                    <button id="settings" data-toggle="modal" data-target="#exampleModal2"><i class="fa fa-cog fa-fw" aria-hidden="true"></i> <span>Paramètres</span></button>
                </div>
            </div>
            <div class="content" style="border-radius:20px;">
                <div class="contact-profile">
                    <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                    <p>Harvey Specter</p>
                    <div class="social-media">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="messages col-12">
                    <ul>


                        <li class="sent">
                            <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
                            <p>How the hell am I supposed to get a jury to believe you when I am not even sure that I do?!</p>
                        </li>
                        <li class="replies">
                            <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                            <p>When you're backed against the wall, break the god damn thing down.</p>
                        </li>
                        <li class="replies">
                            <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                            <p>Excuses don't win championships.</p>
                        </li>
                        <li class="sent">
                            <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
                            <p>Oh yeah, did Michael Jordan tell you that?</p>
                        </li>
                        <li class="replies">
                            <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                            <p>No, I told him that.</p>
                        </li>
                        <li class="replies">
                            <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                            <p>What are your choices when someone puts a gun to your head?</p>
                        </li>
                        <li class="sent">
                            <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
                            <p>What are you talking about? You do what they say or they shoot you.</p>
                        </li>
                        <li class="replies">
                            <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                            <p>Wrong. You take the gun, or you pull out a bigger one. Or, you call their bluff. Or, you do any one of a hundred and forty six other things.</p>
                        </li>
                    </ul>
                </div>
                <div class="message-input" >	
                    <form method="POST" action="treat/traitement.php">
                        <div class="wrap">
                            <div class="">
                                <input type="text" name="message" id="message" placeholder="Ecrire un message..." />
                            </div>
                            <div class="">
                                <input type="hidden" name="pseudo" id="pseudo" value="<?= $_SESSION["id"]; ?> " />
                            </div>

                            <label class="nav">
                                <i class="fa fa-paperclip attachment" aria-hidden="true"></i>
                                <input type="file" name="file" style="display: none;"/>
                            </label>   
                            <button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>

                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajouter Contact</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>   
                    <form id="login-form1" class="form" action="treat/inscription.php" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" name="pseudo" id="pseudo1" placeholder="Chercher un ami..." class="form-control" required="">
                            </div>
                            <div id="result" class="form-group">

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Paramètres</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>   
                    <div class="modal-body">
                        <form id="login-form2" class="form" action="treat/deconnexion.php" method="post">
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Deconnexion</button>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>


                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Begin emoji-picker JavaScript -->
        <script src="js/js_emoji/config.js"></script>
        <script src="js/js_emoji/util.js"></script>
        <script src="js/js_emoji/jquery.emojiarea.js"></script>
        <script src="js/js_emoji/emoji-picker.js"></script>
        <!-- End emoji-picker JavaScript -->

        <!-- Menu Toggle Script -->
        <script>
            $("#menu-toggle").click(function (e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });

            $(window).on("load", function () {
                setTimeout(function () {
                    $('#loader-wrapper').slideUp(500);
                }, 500);

            });
        </script>


        <script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
        <script >$(".messages").animate({scrollTop: $(document).height()}, "fast");

            $("#profile-img").click(function () {
                $("#status-options").toggleClass("active");
            });

            $(".expand-button").click(function () {
                $("#profile").toggleClass("expanded");
                $("#contacts").toggleClass("expanded");
            });

            $("#status-options ul li").click(function () {
                $("#profile-img").removeClass();
                $("#status-online").removeClass("active");
                $("#status-away").removeClass("active");
                $("#status-busy").removeClass("active");
                $("#status-offline").removeClass("active");
                $(this).addClass("active");

                if ($("#status-online").hasClass("active")) {
                    $("#profile-img").addClass("online");
                } else if ($("#status-away").hasClass("active")) {
                    $("#profile-img").addClass("away");
                } else if ($("#status-busy").hasClass("active")) {
                    $("#profile-img").addClass("busy");
                } else if ($("#status-offline").hasClass("active")) {
                    $("#profile-img").addClass("offline");
                } else {
                    $("#profile-img").removeClass();
                }
                ;

                $("#status-options").removeClass("active");
            });

            function newMessage() {
                message = $(".message-input input").val();
                if ($.trim(message) == '') {
                    return false;
                }
                $('<li class="sent"><img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /><p>' + message + '</p></li>').appendTo($('.messages ul'));
                $('.message-input input').val(null);
                $('.contact.active .preview').html('<span>You: </span>' + message);
                $(".messages").animate({scrollTop: $(document).height()}, "fast");
            }
            ;

            $('.submit').click(function (e) {
                e.preventDefault(); // on empêche le bouton d'envoyer le formulaire

                var pseudo = encodeURIComponent($('#pseudo').val()); // on sécurise les données
                var message = encodeURIComponent($('#message').val());

                if (pseudo !== "" && message !== "") { // on vérifie que les variables ne sont pas vides
                    $.ajax({
                        url: "treat/traitement.php", // on donne l'URL du fichier de traitement
                        type: "POST", // la requête est de type POST
                        data: "pseudo=" + pseudo + "&message=" + message // et on envoie nos données
                    });
                    newMessage();

                }
            });

            $("#pseudo1").on('keyup', function () {
                var pseudo = encodeURIComponent($('#pseudo1').val());
                if (pseudo !== "") { // on vérifie que les variables ne sont pas vides
                    $.ajax({
                        url: "treat/searchuser.php?pseudo=" + pseudo, // on donne l'URL du fichier de traitement
                        type: 'GET', // la requête est de type POST
                        success: function (html) {
                            $('#result').html(html);
                        }
                    });
                }

            });

            $("#pseudo2").on('keyup', function () {
                var pseudo = encodeURIComponent($('#pseudo2').val());
                if (pseudo !== "") { // on vérifie que les variables ne sont pas vides
                    $.ajax({
                        url: "treat/searchdiscussion.php?pseudo=" + pseudo, // on donne l'URL du fichier de traitement
                        type: 'GET', // la requête est de type POST
                        success: function (html) {
                            $('#resultdisc').html(html);
                        }
                    });
                }
            });

            $("body").on('click', '.disc', function () {
                var pseudo = encodeURIComponent($(this).val());
                if (pseudo !== "") { // on vérifie que les variables ne sont pas vides
                    $.ajax({
                        url: "treat/addisc.php?pseudo=" + pseudo, // on donne l'URL du fichier de traitement
                        type: 'POST', // la requête est de type POST
                        success: function (html) {
                            $('#result').html(html);
                        }
                    });
                }
            });



            $(window).on('keydown', function (e) {
                if (e.which == 13) {
                    newMessage();
                    return false;
                }
            });
            //# sourceURL=pen.js
        </script>

    </body>

</html>

