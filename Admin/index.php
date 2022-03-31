<?php
switch ($page) {
    case 'deconnexion':
        session_destroy();
        header('Location:index.php?page=accueil');
        exit();
    break;
}