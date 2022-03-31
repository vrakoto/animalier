<?php

class Connexion {
    private PDO $pdo;

    function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=animalis', 'root', null, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
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

    function faireDon(float $montant): bool
    {
        $req = "INSERT INTO dons (montant) VALUES (:montant)";
        $p = $this->pdo->prepare($req);
        return $p->execute([
            'montant' => $montant
        ]);
    }

    /**
     * Retourne les informations de tous les animaux présents dans la BDD
     * 
     * @return array
     */
    function getLesAnimaux(): array
    {
        $req = "SELECT * FROM animal ORDER BY id DESC";
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

    function adopterAnimal(string|array $infos)
    {
        if (is_array($infos)) {
            foreach ($infos as $key => $info) {
                $req = "INSERT INTO animal_adopte (idAnimal, idUtilisateur) VALUES (:idAnimal, idUtilisateur)";
            }
        }
        /* $req = "INSERT INTO animal_adopte (idAnimal, idUtilisateur) VALUES (:idAnimal, idUtilisateur)";
        $p = $this->pdo->prepare($req);
        return $p->execute([
            'idAnimal' => $idAnimal,
            'nom' => $nom,
            'prenom' => $prenom
        ]); */
    }

}