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
                <th>Intéraction</th>
            </tr>
            <?php foreach ($lesProduits as $produit): ?>
                <tr class="laLigneAnimal">
                    <td data-th="Photo">
                        <img height="100" width="100" alt="Image de l'animal en grand" src="<?= htmlentities($produit['img']) ?>">
                    </td>
                    <td data-th="Nom">
                        <?= htmlentities($produit['nom']) ?>
                    </td>
                    <td data-th="Prix Unitaire">
                        <?= (float)$produit['prixUnit'] ?>
                    </td>
                    <td data-th="Quantité">
                        <?= (int)$produit['quantite'] ?>
                    </td>
                    <td data-th="Description">
                        <?= htmlentities($produit['descriptions']) ?>
                    </td>
                    <td data-th="Intéraction">
                        <a href="index.php?page=modifierProduit&id=<?= (int)$produit['id'] ?>" class="btnDon edit"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="index.php?page=supprimerProduit&id=<?= (int)$produit['id'] ?>" class="btnDon delete"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>