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
        $req = "INSERT INTO animal (photo, nom, age, race, description) VALUES (:photo, :nom, :age, :race, :description)";
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

    function ajouterProduit(array $forms): bool
    {
        $statements = [];
        $req = "INSERT INTO produits (img, nom, prixUnit, quantite, descriptions) VALUES (:img, :nom, :prixUnit, :quantite, :descriptions)";
        foreach ($forms as $key => $val) {
            $statements[$key] = $val;
        }
        $p = $this->pdo->prepare($req);
        return $p->execute($statements);
    }

    function modifierProduit(int $idProduit, array $forms): bool
    {
        $statements = [];
        $statements['id'] = $idProduit;
        $req = "UPDATE `produits` SET `img` = :img, `nom` = :nom, `prixUnit` = :prixUnit, `quantite` = :quantite, `descriptions` = :descriptions WHERE id = :id";
        foreach ($forms as $key => $val) {
            $statements[$key] = $val;
        }
        $p = $this->pdo->prepare($req);
        return $p->execute($statements);
    }

    function supprimerProduit(int $idProduit): bool
    {
        $req = "DELETE FROM produits WHERE id = :id";
        $p = $this->pdo->prepare($req);
        return $p->execute(['id' => $idProduit]);
    }

    function deconnexion(): bool
    {
        session_destroy();
        header('Location:index.php?page=accueil');
        return exit();
    }
    
}