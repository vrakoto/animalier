<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='description' content="Site d'adoption d'animaux">
    <meta name='author' content="Carellien, Davin, Saïd">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="elements/style.css">
</head>

<body>
    <div class="navbar">
        <a class="logo"><img src="vues/assets/logo.png" height="60px"></a>

        <div class="links">
            <div><a href="index.php?page=accueil">Accueil</a></div>
            <div><a href="index.php?page=nosProduits">Nos Produits</a></div>
            <?php if ($connecte): ?>
                <div><a href="index.php?page=gestionAnimaux">Gestion animaux</a></div>
                <div><a href="index.php?page=gestionProduits">Gestion produits</a></div>
                <div><a href="index.php?page=deconnexion">Déconnexion</a></div>
            <?php else: ?>
                <div><a href="index.php?page=connexion">Connexion</a></div>
            <?php endif ?>
        </div>
    </div>