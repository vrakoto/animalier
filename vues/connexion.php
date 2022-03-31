<div class="wallpaper">
    <div class="container-form">
    <?php if (isset($erreur)) : ?>
        <h1><?= $erreur ?></h1>
        <a href="index.php?page=connexion" class="btnDon">Retourner</a>
    <?php else : ?>
        <h1>Connexion</h1>
        <form method="POST" action="index.php?page=connexion">
            <input type="email" placeholder="Adresse mail" name="mail" id="mail" autofocus>
            <input type="password" placeholder="Mot de passe" name="mdp" id="mdp">
            <button type="submit" class="btnDon">Connexion</button>
        </form>
    </div>
    <?php endif ?>
</div>