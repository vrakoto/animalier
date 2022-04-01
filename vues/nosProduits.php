<div class="container produits">
    <?php foreach ($lesProduits as $produit): ?>
        <div class="cardProduit">
            <img src="<?= htmlentities($produit['img']) ?>" alt="Image du produit">
            <hr>
            <h2><?= htmlentities($produit['nom']) ?></h2>
            <h3><?= (float)$produit['prixUnit'] ?> €</h3>
            <button class="btnDon">Ajouter au panier</button>
        </div>
    <?php endforeach ?>
</div>