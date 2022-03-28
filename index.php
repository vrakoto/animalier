<?php
require_once 'BDD/Connexion.php';

$connexion = new Connexion;
echo '<pre>';
print_r($connexion->getLesAnimaux());
echo '</pre>';