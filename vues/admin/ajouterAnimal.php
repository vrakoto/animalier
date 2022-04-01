<div class="wallpaper modificationAnimal">
    <div class="container-form">
        <h1 style="margin-bottom: unset !important;">Ajouter un animal</h1>

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

        <form method="POST" action="index.php?page=ajouterAnimal" style="margin-top: 2rem">
            <label for="photo">Sa photo</label>
            <input type="text" name="photo" id="photo" placeholder="Uniquement en URL" autofocus>

            <label for="nom">Son nom</label>
            <input type="text" name="nom" id="nom">

            <label for="age">Son age</label>
            <input type="number" name="age">
            
            <label for="race">Sa race</label>
            <input type="text" name="race" id="race">

            <label for="description">Sa description</label>
            <div>
                <textarea style="width: 100%; border: 1px solid #000" name="description" id="description"></textarea>
            </div>

            <button type="submit" class="btnDon">Ajouter</button>
        </form>
    </div>
</div>