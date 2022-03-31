<div class="container">
    <h2>Les demandes pour l'animal n°<?= $idAnimal ?></h2>
    <br>

    <table class="rwd-table">
        <tbody>
            <tr>
                <th>Identifiant de l'utilisateur</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Motivation</th>
                <th>Date d'envoie</th>
                <th>Intéraction</th>
            </tr>
            <?php foreach ($lesDemandes as $laDemande): ?>
                <tr class="laLigneAnimal">
                    <td data-th="Identifiant de l'utilisateur">
                        <?= htmlentities($laDemande['idUtilisateur']) ?>
                    </td>
                    <td data-th="Nom">
                        <?= htmlentities($laDemande['nom']) ?>
                    </td>
                    <td data-th="Prénom">
                        <?= htmlentities($laDemande['prenom']) ?>
                    </td>
                    <td data-th="Motivation">
                        <?= htmlentities($laDemande['motivation']) ?>
                    </td>

                    <td data-th="Date d'envoie">
                        <?= htmlentities($laDemande['dateEnvoie']) ?>
                    </td>

                    <td data-th="Intéraction">
                        <a class="btnDon edit" style="background: yellow; color: black"><i class="fa-solid fa-folder-open"></i></a>
                        <a class="btnDon delete"><i class="fa-solid fa-xmark"></i></i></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>