<div class="container">
    <?php if (!isset($erreur)) : ?>
        <h1>Fiche Animal</h1>
        <img class="ficheImg" alt="Image de l'animal en grand" src="data:image/jpeg;base64,<?= base64_encode($img) ?>">

        <h2>Informations</h2>

        <div class="ficheInfos">
            <div class="leInfo">Nom : <?= $nom ?></div>
            <div class="leInfo">Age : <?= $age ?></div>
            <div class="leInfo">Race : <?= $race ?></div>
            <div class="leInfo">Description : <?= $description ?></div>
        </div>

        <?php if (!$connecte): ?>
            <button class="btnDon" onclick="afficherRenseignementAdoption()">Adoption</button>

            <form class="ficheRenseignements" action="index.php?page=consulterAnimal&id=<?= $id ?>&adopter" method="POST">
                <h3>Renseignez les champs</h3>
                <div>
                    <input type="text" name="nom" id="nom" placeholder="Votre nom">
                </div>

                <div>
                    <input type="text" name="prenom" id="prenom" placeholder="Votre prénom">
                </div>

                <button type="submit" class="btnDon">Adopter</button>
            </form>
        <?php else: ?>
            <form action="index.php?page=consulterAnimal&id<?= $id ?>&adopter" method="post">
                <button type="submit" class="btnDon">Adopter</button>
            </form>
        <?php endif ?>

    <?php else : ?>
        <h1><?= $erreur ?></h1>
    <?php endif ?>
</div>