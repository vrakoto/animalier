<div class="container">
    <h2>Gestion des produits</h2>
    <br>
    <a href="index.php?page=ajouterProduit" class="btnDon" style="text-decoration: none;">+ Ajouter</a>

    <table class="rwd-table">
        <tbody>
            <tr>
                <th>Photo</th>
                <th>Nom du produit</th>
                <th>Prix Unitaire</th>
                <th>Quantité</th>
                <th>Description</th>
            </tr>
            <?php foreach ($lesProduits as $produit): ?>
                <tr class="laLigneAnimal">
                    <td data-th="Photo">
                        <img height="100" width="100" alt="Image de l'animal en grand" src="<?= htmlspecialchars($produit['photo']) ?>">
                    </td>
                    <td data-th="Nom">
                        <?= htmlentities($produit['nom']) ?>
                    </td>
                    <td data-th="Prix Unitaire">
                        <?= (int)$produit['prixUnit'] ?>
                    </td>
                    <td data-th="Quantité">
                        <?= htmlentities($produit['quantite']) ?>
                    </td>
                    <td data-th="Description">
                        <?= htmlentities($produit['description']) ?>
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