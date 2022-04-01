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
        $lesAnimauxCarroussel = $pdo->getLesAnimaux(10);
        $lesAnimaux30DerniersJours = $pdo->last30DaysAnimaux();

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
            $dateAjout = $pdo::convertDate($leAnimal['dateAjout']);
        } catch (\Throwable $th) {
            $erreur = 'Animal introuvable';
        }

        

        if (!empty($_POST)) {
            $lesErreurs = $pdo->getErreursForms($_POST);

            // on configure une erreur par défaut qui sera ensuite changée si la procédure est bien passée.
            $style = "erreur";
            $msg = "Le formulaire est invalide, des champs sont vides";
            //
            if (empty($lesErreurs)) {
                try {
                    $nom = htmlentities($_POST['nom']);
                    $prenom = htmlentities($_POST['prenom']);
                    $mail = htmlentities($_POST['mail']);
                    $motivation = htmlentities($_POST['motivation']);
                    $pdo->demanderAdoption($id, $nom, $prenom, $mail, $motivation);
                    $style = "success";
                    $msg = "Demande d'adoption envoyée.";
                } catch (\Throwable $th) {
                    $msg = "Demande d'adoption impossible";
                }
            }
        }
        require_once $template . 'consulterAnimal.php';
    break;

    case 'nosProduits':
        $lesProduits = $pdo->getLesProduits();
        require_once $template . 'nosProduits.php';
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