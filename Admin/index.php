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
            $lesErreurs = $pdo->getErreursForms($_POST);
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
            $lesErreurs = $pdo->getErreursForms($_POST);
            if (empty($lesErreurs)) {
                try {
                    $admin->ajouterAnimal($_POST);
                    header("Location:index.php?page=gestionAnimaux");
                    exit();
                } catch (\Throwable $th) {
                    $msg = 'Ajout impossible';
                }
            } else {
                $style = "erreur";
                $msg = "Le formulaire est invalide, des champs sont vides";
            }
        }
        require_once $adminTemplates . 'ajouterAnimal.php';
    break;



    case 'gestionProduits':
        $lesProduits = $pdo->getLesProduits();
        require_once $adminTemplates . 'gestionProduits.php';
    break;

    case 'ajouterProduit':
        if (!empty($_POST)) {
            $lesErreurs = $pdo->getErreursForms($_POST);
            if (empty($lesErreurs)) {
                try {
                    $admin->ajouterProduit($_POST);
                    header("Location:index.php?page=gestionProduits");
                    exit();
                } catch (\Throwable $th) {
                    $style = 'erreur';
                    $msg = 'Ajout impossible';
                }
            } else {
                $style = 'erreur';
                $msg = 'Des champs sont vides';
            }
        }
        require_once $adminTemplates . 'ajouterProduit.php';
    break;

    case 'modifierProduit':
        $idProduit = (int)$_REQUEST['id'];
        try {
            $leProduit = $pdo->getLeProduit($idProduit);
            $lienImg = htmlentities($leProduit['img']);
            $nom = htmlentities($leProduit['nom']);
            $prixUnit = (float)$leProduit['prixUnit'];
            $quantite = (int)$leProduit['quantite'];
            $description = htmlentities($leProduit['descriptions']);
        } catch (\Throwable $th) {
            $erreur = 'Produit introuvable';
        }

        if (!empty($_POST)) {
            $lesErreurs = $pdo->getErreursForms($_POST);
            if (empty($lesErreurs)) {
                try {
                    $admin->modifierProduit($idProduit, $_POST);
                    header("Refresh:0");
                    exit();
                } catch (\Throwable $th) {
                    $erreur = 'Modification impossible';
                }
            }
        }
        require_once $adminTemplates . 'modifierProduit.php';
    break;

    case 'supprimerProduit':
        $idProduit = (int)$_REQUEST['id'];
        try {
            $admin->supprimerProduit($idProduit);
            header('Location:index.php?page=gestionProduits');
            exit();
        } catch (\Throwable $th) {
            $erreur = "Impossible de supprimer le produit";
        }
    break;

    case 'deconnexion':
        $admin->deconnexion();
    break;
}