<?php

class Connexion {
    private $pdo;

    function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=animalis', 'root', null, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

    function getLesAnimaux(): array
    {
        $req = "SELECT * FROM animal ORDER BY nom";
        $p = $this->pdo->query($req);

        return $p->fetchAll();
    }

    function demanderReservation(): bool
    {
        
    }

}