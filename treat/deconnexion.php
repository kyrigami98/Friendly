<?php

$_SESSION["id"] = "";
$_SESSION["pseudo"] = "";
session_destroy();
header('location:../index.html');
exit;

