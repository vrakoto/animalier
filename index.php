<?php
require_once 'BDD/Connexion.php';
$root = __DIR__ . DIRECTORY_SEPARATOR;
$template = $root . 'front_SPA' . DIRECTORY_SEPARATOR;
$elements = $root . 'elements' . DIRECTORY_SEPARATOR;

$pdo = new Connexion;

if (empty($_REQUEST['page'])) {
    header('Location:index.php?page=accueil');
    exit();
}
$page = $_REQUEST['page'];

$connecte = FALSE;
if (isset($_SESSION['id'])) {
    $connecte = TRUE;
}

require_once 'elements/header.php';

switch ($page) {
    case 'accueil':
        $totalDons = $pdo->getTotalDons();
        $unit = 1;
        $lesAnimaux = $pdo->getLesAnimaux();

        if (isset($_POST['montant']) && !empty($_POST['montant'])) {
            $montant = (float)$_POST['montant'];
            $pdo->faireDon($montant);
            header('Location:index.php?page=accueil');
            exit();
        }
        require_once $template . 'index.php';
    break;

    case 'dons':
        require_once $template . 'dons.php';
    break;

    case 'consulterAnimal':
        $idAnimal = (int)$_REQUEST['id'];
        try {
            $leAnimal = $pdo->getLeAnimal($idAnimal);
            $id = (int)$leAnimal['id'];
            $img = $leAnimal['photo'];
            $nom = htmlentities($leAnimal['nom']);
            $age = (int)$leAnimal['age'];
            $race = htmlentities($leAnimal['race']);
            $description = htmlentities($leAnimal['description']);
        } catch (\Throwable $th) {
            $erreur = 'Animal introuvable';
        }

        echo "ok";
        echo '<br>';
        echo "ok";
        echo '<br>';
        echo "ok";
        echo '<br>';
        echo "ok";
        echo '<br>';
        echo "ok";
        echo '<br>';
        echo "ok";
        echo '<br>';
        if ($connecte && isset($_REQUEST['adopter'])) {
            $infos = $idAnimal;
            if (!empty($_POST['nom']) && !empty($_POST['prenom'])) {
                $nom = htmlentities($_POST['nom']);
                $prenom = htmlentities($_POST['prenom']);
                $infos = ['nom' => $nom, 'prenom' => $prenom];
            }
            $pdo->adopterAnimal($infos);
        }

        require_once $template . 'consulterAnimal.php';
    break;

    case 'connexion':
        require_once $template . 'connexion.php';
    break;

    default:
        require_once $template . 'erreur.php';
    break;
}
require_once 'elements/footer.php';