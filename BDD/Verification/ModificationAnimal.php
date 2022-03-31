<?php
/* namespace App\Verification;
use App\Administrateur;

class ModificationAnimal extends Administrateur {
    private int $idAnimal;
    private array $forms;

    function __construct(int $idAnimal, array $forms)
    {
        $this->idAnimal = $idAnimal;
        $this->forms = $forms;
    }
    

    function getErreursModification(): array
    {
        $erreurs = [];
        foreach ($this->forms as $input => $val) {
            if (empty(trim($val))) {
                $erreurs = [$input];
            }
        }
        return $erreurs;
    }

    function modifierAnimal(): bool
    {
        $statements = [];
        $statements['id'] = $this->idAnimal;
        $req = "UPDATE animal SET nom = :nom, age = :age, race = :race, description = :description WHERE id = :id";
        foreach ($this->forms as $key => $val) {
            $statements[$key] = $val;
        }
        $p = $this->pdo->prepare($req);
        return $p->execute($statements);
    }
} */