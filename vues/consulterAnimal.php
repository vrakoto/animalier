<?php if (isset($msg)): ?>
    <div class="container msg <?= $style ?>">
        <h1><?= $msg ?></h1>
    </div>
<?php endif ?>

<div class="container">
    <h1>Fiche Animal</h1>

    <?php if ($connecte): ?>
        <br>
        <a class="btnDon" href="index.php?page=lesDemandes&id=<?= $id ?>">Consulter les demandes</a>
    <?php endif ?>

    <div>
        <img class="ficheImg" alt="Image de l'animal en grand" src="<?= htmlentities($img) ?>">
    </div>

    <h2>Informations</h2>

    <div class="ficheInfos">
        <div class="leInfo">Nom : <?= $nom ?></div>
        <div class="leInfo">Age : <?= $age ?></div>
        <div class="leInfo">Race : <?= $race ?></div>
        <div class="leInfo">Description : <?= $description ?></div>
        <div class="leInfo">Date d'ajout : <?= $dateAjout ?></div>
    </div>

    <button class="btnDon" onclick="afficherRenseignementAdoption()">Demande d'adoption</button>

    <form class="ficheRenseignements" action="index.php?page=consulterAnimal&id=<?= $id ?>" method="POST">
        <h3>Renseignez les champs</h3>
        <div>
            <input type="text" name="prenom" id="prenom" placeholder="Votre prénom">
        </div>
        <div>
            <input type="text" name="nom" id="nom" placeholder="Votre nom">
        </div>
        <div>
            <input type="email" name="mail" id="mail" placeholder="Votre mail">
        </div>

        <br>

        <div>
            <textarea name="motivation" id="motivation" placeholder="Redigez votre motivation"></textarea>
        </div>
        <button type="submit" class="btnDon">Déposer la demande</button>
    </form>
</div>