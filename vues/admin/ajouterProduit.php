<?php if (isset($msg)): ?>
    <div class="container msg <?= $style ?>">
        <h1><?= $msg ?></h1>
    </div>
<?php endif ?>

<div class="wallpaper modificationAnimal">
    <div class="container-form">
        <h1 style="margin-bottom: unset !important;">Ajouter un produit</h1>

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

        <form method="POST" action="index.php?page=ajouterProduit" style="margin-top: 2rem">
            <label for="img">Sa photo</label>
            <input type="text" name="img" placeholder="Uniquement en URL" autofocus>

            <label for="nom">Son nom</label>
            <input type="text" name="nom">

            <label for="prix">Son prix unitaire</label>
            <input type="number" name="prixUnit" min="0.01" step="0.01">
            
            <label for="quantite">Sa quantité</label>
            <input type="number" name="quantite" step="0.01" min="1">

            <label for="description">Sa description</label>
            <div>
                <textarea style="width: 100%; border: 1px solid #000" name="descriptions"></textarea>
            </div>

            <button type="submit" class="btnDon">Ajouter</button>
        </form>
    </div>
</div>