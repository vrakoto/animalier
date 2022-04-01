<div class="wallpaper modificationAnimal">
    <div class="container-form">
        <h1 style="margin-bottom: unset !important;">Modification Produit ID N° <?= $idProduit ?></h1>

        <?php if (!empty($lesErreurs)): ?>
            <div class="erreursModification">
                <h3>Erreur formulaire</h3>
                <ul>
                    <?php foreach ($lesErreurs as $erreur): ?>
                        <li>le champ '<?= $erreur ?>' est vide</li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>

        <form method="POST" action="index.php?page=modifierProduit&id=<?= $idProduit ?>">

            <label for="img">Son image (uniquement en lien URL)</label>
            <input type="text" name="img" value="<?= $lienImg ?>" autofocus>

            <label for="nom">Son nom</label>
            <input type="text" name="nom" value="<?= $nom ?>">

            <label for="prixUnit">Son prix unitaire</label>
            <input type="number" name="prixUnit" value="<?= $prixUnit ?>" step="0.01">
            
            <label for="quantite">Sa quantité</label>
            <input type="number" name="quantite" value="<?= $quantite ?>" min="1">

            <label for="descriptions">Sa description</label>
            <div>
                <textarea style="width: 100%; border: 1px solid #000" name="descriptions"><?= $description ?></textarea>
            </div>

            <button type="submit" class="btnDon">Modifier</button>
        </form>
    </div>
</div>