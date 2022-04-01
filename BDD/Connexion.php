<?php
namespace App;

use DateTime;
use PDO;

class Connexion {
    protected PDO $pdo;

    function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=animalis', 'root', null, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
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

    function getTotalDons(): float
    {
        $req = "SELECT montant FROM dons";
        $p = $this->pdo->query($req);

        $total = 0;
        foreach ($p->fetchAll() as $leMontant) {
            $total += $leMontant['montant'];
        }

        return $total;
    }

    /**
     * Retourne les informations de tous les animaux présents dans la BDD
     * 
     * @return array
     */
    function getLesAnimaux(int $limit = NULL)
    {
        $req = "SELECT * FROM animal ORDER BY id DESC";
        if ($limit != NULL) {
            $req .= " LIMIT " . $limit;
        }
        $p = $this->pdo->query($req);

        return $p->fetchAll();
    }

    /**
     * Retourne toutes les informations d'un animal spécifique
     * 
     * @return array
     */
    function getLeAnimal(int $idAnimal): array
    {
        $req = "SELECT * FROM animal WHERE id = :id";
        $p = $this->pdo->prepare($req);
        $p->execute(['id' => $idAnimal]);

        return $p->fetch();
    }

    function last30DaysAnimaux(): array
    {
        $req = "SELECT * FROM animal WHERE dateAjout >= DATE_ADD(CURDATE(), INTERVAL -30 DAY)";
        $lesAnimaux = $this->pdo->query($req);

        return $lesAnimaux->fetchAll();
    }

    function faireDon(float $montant): bool
    {
        $req = "INSERT INTO dons (montant) VALUES (:montant)";
        $p = $this->pdo->prepare($req);
        return $p->execute([
            'montant' => $montant
        ]);
    }

    function demanderAdoption(string $idAnimal, string $nom, string $prenom, string $mail, string $motivation): bool
    {
        $req = "INSERT INTO demandes (idAnimal, nom, prenom, mail, motivation) VALUES (:idAnimal, :nom, :prenom, :mail, :motivation)";
        $p = $this->pdo->prepare($req);
        return $p->execute([
            'idAnimal' => $idAnimal,
            'nom' => $nom,
            'mail' => $mail,
            'prenom' => $prenom,
            'motivation' => $motivation
        ]);
    }

    function authValid(string $mail, string $mdp): bool
    {
        $req = "SELECT mail, mdp FROM admin
                WHERE mail = :mail AND mdp = :mdp";
        $p = $this->pdo->prepare($req);
        $p->execute([
            'mail' => $mail,
            'mdp' => $mdp
        ]);

        return !empty($p->fetchAll());
    }


    function getLeProduit(int $idProduit): array
    {
        $req = "SELECT * FROM produits WHERE id = :id";
        $p = $this->pdo->prepare($req);
        $p->execute(['id' => $idProduit]);

        return $p->fetch();
    }

    function getLesProduits(): array
    {
        $req = "SELECT * FROM produits ORDER BY dateAjout DESC";
        $p = $this->pdo->query($req);
        
        return $p->fetchAll();
    }

    static function convertDate(string $date): string
    {
        $date = new DateTime($date);
        return $date->format('d/m/Y');
    }
}