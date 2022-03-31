<?php
session_start();
use App\Connexion;

require_once 'vendor/autoload.php';
$root = __DIR__ . DIRECTORY_SEPARATOR;
$template = $root . 'vues' . DIRECTORY_SEPARATOR;
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

        if (isset($_REQUEST['demandeAdoption']) && !empty($_POST['nom']) && !empty($_POST['prenom'])) {
            $nom = htmlentities($_POST['nom']);
            $prenom = htmlentities($_POST['prenom']);
            $motivation = htmlentities($_POST['motivation']);
            try {
                $pdo->demanderAdoption($id, $nom, $prenom, $motivation);
                header("Location:index.php?page=consulterAnimal&id=" . $id);
                exit();
            } catch (\Throwable $th) {
                $erreur = 'Demande impossible pour le moment';
            }
        }

        require_once $template . 'consulterAnimal.php';
    break;

    case 'connexion':
        if (isset($_POST['mail'], $_POST['mdp'])) {
            $mail = htmlentities($_POST['mail']);
            $mdp = htmlentities($_POST['mdp']);

            if ($pdo->authValid($mail, $mdp)) {
                $_SESSION['id'] = $mail;
                header('Location:index.php?page=accueil');
                exit();
            } else {
                $erreur = 'Authentification incorrecte';
            }
        }

        require_once $template . 'connexion.php';
    break;
}

if ($connecte) {
    require_once 'Admin/index.php';
}
require_once 'elements/footer.php';