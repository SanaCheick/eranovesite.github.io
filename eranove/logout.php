<?php
// Déconnexion de l'utilisateur
session_start();
session_destroy();
header('Location: ./login.php');
exit();
?>
