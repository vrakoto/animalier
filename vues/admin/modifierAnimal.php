<div class="wallpaper modificationAnimal">
    <div class="container-form">
        <?php if (isset($success)): ?>
            <h1><?= $success ?></h1>
        <?php endif ?>
        <h1 style="margin-bottom: unset !important;">Modification Animal N° <?= $idAnimal ?></h1>

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

        <form method="POST" action="index.php?page=modifierAnimal&id=<?= $idAnimal ?>" style="margin-top: 1rem">

            <label for="photo">Sa photo (uniquement en lien URL)</label>
            <input type="text" name="photo" id="photo" value="<?= $lienImg ?>" autofocus>

            <label for="nom">Son nom</label>
            <input type="text" name="nom" id="nom" value="<?= $nom ?>">

            <label for="age">Son age</label>
            <input type="text" name="age" id="age" value="<?= $age ?>">
            
            <label for="race">Sa race</label>
            <input type="text" name="race" id="race" value="<?= $race ?>">

            <label for="description">Sa description</label>
            <div>
                <textarea style="width: 100%; border: 1px solid #000" name="description" id="description"><?= $description ?></textarea>
            </div>

            <button type="submit" class="btnDon">Modifier</button>
        </form>
    </div>
</div>