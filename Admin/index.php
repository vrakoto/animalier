<?php

use App\Administrateur;

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;
$adminTemplates = $root . 'vues' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR;
$elements = $root . 'elements' . DIRECTORY_SEPARATOR;

$admin = new Administrateur;

switch ($page) {
    case 'gestionAnimaux':
        $lesAnimaux = $pdo->getLesAnimaux();
        require_once $adminTemplates . 'gestionAnimaux.php';
    break;
    
    case 'lesDemandes':
        $idAnimal = (int)$_REQUEST['id'];
        $lesDemandes = $admin->getLesDemandes($idAnimal);
        require_once $adminTemplates . 'lesDemandes.php';
    break;

    case 'modifierAnimal':
        $idAnimal = (int)$_REQUEST['id'];
        try {
            $leAnimal = $pdo->getLeAnimal($idAnimal);
            $lienImg = $leAnimal['photo'];
            $nom = htmlentities($leAnimal['nom']);
            $age = (int)$leAnimal['age'];
            $race = htmlentities($leAnimal['race']);
            $description = htmlentities($leAnimal['description']);
        } catch (\Throwable $th) {
            $erreur = 'Animal introuvable';
        }

        if (isset($_POST)) {
            $lesErreurs = $admin->getErreursForms($_POST);
            if (empty($lesErreurs)) {
                try {
                    $admin->modifierAnimal($idAnimal, $_POST);
                    header("Refresh:0");
                    exit();
                } catch (\Throwable $th) {
                    $erreur = 'Modification impossible';
                }
            }
        }
        require_once $adminTemplates . 'modifierAnimal.php';
    break;

    case 'supprimerAnimal':
        $idAnimal = (int)$_REQUEST['id'];
        try {
            $admin->supprimerAnimal($idAnimal);
            header('Location:index.php?page=gestionAnimaux');
            exit();
        } catch (\Throwable $th) {
            $erreur = "Impossible de supprimer l'animal";
        }
    break;

    case 'ajouterAnimal':
        if (isset($_POST)) {
            $lesErreurs = $admin->getErreursForms($_POST);
            if (empty($lesErreurs)) {
                try {
                    $admin->ajouterAnimal($_POST);
                    header("Location:index.php?page=gestionAnimaux");
                    exit();
                } catch (\Throwable $th) {
                    $erreur = 'Ajout impossible';
                }
            }
        }
        require_once $adminTemplates . 'ajouterAnimal.php';
    break;



    case 'gestionProduits':
        $lesProduits = $admin->getLesProduits();
        require_once $adminTemplates . 'gestionProduits.php';
    break;

    case 'ajouterProduit':
        if (isset($_POST)) {
            $lesErreurs = $admin->getErreursForms($_POST);
            if (empty($lesErreurs)) {
                try {
                    $admin->ajouterProduit($_POST);
                    header("Location:index.php?page=gestionProduits");
                    exit();
                } catch (\Throwable $th) {
                    $erreur = 'Ajout impossible';
                }
            }
        }
        require_once $adminTemplates . 'ajouterProduit.php';
    break;

    case 'deconnexion':
        $admin->deconnexion();
    break;
}