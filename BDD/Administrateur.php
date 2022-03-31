<?php
namespace App;
use App\Connexion;

class Administrateur extends Connexion {
    function supprimerAnimal(int $idAnimal): bool
    {
        $req = "DELETE FROM animal WHERE id = :id";
        $p = $this->pdo->prepare($req);
        return $p->execute(['id' => $idAnimal]);
    }

    function getErreursForms(array $forms): array
    {
        $erreurs = [];
        foreach ($forms as $input => $val) {
            if (empty(trim($val))) {
                $erreurs = [$input];
            }
        }
        return $erreurs;
    }

    function modifierAnimal(int $idAnimal, array $forms): bool
    {
        $statements = [];
        $statements['id'] = $idAnimal;
        $req = "UPDATE animal SET photo = :photo, nom = :nom, age = :age, race = :race, description = :description WHERE id = :id";
        foreach ($forms as $key => $val) {
            $statements[$key] = $val;
        }
        $p = $this->pdo->prepare($req);
        return $p->execute($statements);
    }

    function ajouterAnimal(array $forms): bool
    {
        $statements = [];
        $req = "INSERT INTO animal SET photo = :photo, nom = :nom, age = :age, race = :race, description = :description";
        foreach ($forms as $key => $val) {
            $statements[$key] = $val;
        }
        $p = $this->pdo->prepare($req);
        return $p->execute($statements);
    }

    function getLesDemandes(int $idAnimal): array
    {
        $req = "SELECT * FROM demandes WHERE idAnimal = :idAnimal";
        $p = $this->pdo->prepare($req);
        $p->execute(['idAnimal' => $idAnimal]);
        
        return $p->fetchAll();
    }


    function getLesProduits(): array
    {
        $req = "SELECT * FROM produits ORDER BY dateAjout DESC";
        $p = $this->pdo->query($req);
        
        return $p->fetchAll();
    }

    function ajouterProduit(array $forms): bool
    {
        $statements = [];
        $req = "INSERT INTO produits SET image = :image, nom = :nom, prixUnit = :prixUnit, quantite = :quantite, description = :description";
        foreach ($forms as $key => $val) {
            $statements[$key] = $val;
        }
        $p = $this->pdo->prepare($req);
        return $p->execute($statements);
    }

    function deconnexion(): bool
    {
        session_destroy();
        header('Location:index.php?page=accueil');
        return exit();
    }
    
}