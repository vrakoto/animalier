<div class="container">
    <?php if (isset($erreur)): ?>
        <h2><?= $erreur ?></h2>
    <?php endif ?>
    <h2>Gestion des animaux</h2>
    <br>
    <a href="index.php?page=ajouterAnimal" class="btnDon" style="text-decoration: none;">+ Ajouter</a>

    <table class="rwd-table">
        <tbody>
            <tr>
                <th>Photo</th>
                <th>Nom</th>
                <th>Age</th>
                <th>Race</th>
                <th>Intéraction</th>
            </tr>
            <?php foreach ($lesAnimaux as $animal): ?>
                <tr class="laLigneAnimal">
                    <td data-th="Photo">
                        <img height="100" width="100" alt="Image de l'animal en grand" src="<?= htmlspecialchars($animal['photo']) ?>">
                    </td>
                    <td data-th="Nom">
                        <?= htmlentities($animal['nom']) ?>
                    </td>
                    <td data-th="Age">
                        <?= (int)$animal['age'] ?>
                    </td>
                    <td data-th="Race">
                        <?= htmlentities($animal['race']) ?>
                    </td>
                    <td data-th="Intéraction">
                        <a href="index.php?page=consulterAnimal&id=<?= (int)$animal['id'] ?>" class="btnDon see"><i class="fa-solid fa-eye"></i></a>
                        <a href="index.php?page=modifierAnimal&id=<?= (int)$animal['id'] ?>" class="btnDon edit"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="index.php?page=supprimerAnimal&id=<?= (int)$animal['id'] ?>" class="btnDon delete"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>