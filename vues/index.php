<div class='container'>
    <h2>Aidez-nous à leur offrir une nouvelle vie</h2>
    <div class="totalDons"><?= $totalDons ?> € de dons récoltés.</div>

    <form method="post" class="donnations">
        <div class="title-don">Mon Don</div>
        <div class="allprice">
            <div class="first-line">
                <div class="price">50</div>
                <div class="price">80</div>
                <div class="price">100</div>
                <div class="price">120</div>
            </div>

            <div class="sd-line">
                <div class="price">150</div>
                <div class="price">300</div>
                <div class="price">500</div>
                <div class="price">1000</div>
            </div>
        </div>

        <div class="montant-libre">
            <input type="number" name="montant" id="montant" placeholder="Montant libre" min="0.01" step="0.01">
            <div>€</div>
        </div>
        <button type="submit" class="btnDon">Donner</button>
    </form>
    <div class="slide-container">
        <?php foreach ($lesAnimauxCarroussel as $animal) : ?>
            <a href="index.php?page=consulterAnimal&id=<?= (int)$animal['id'] ?>" class="custom-slider fade">
                <div class="slide-index"><?= $unit++ ?> / <?= count($lesAnimauxCarroussel) ?></div>
                <img class="slide-img" src="<?= htmlentities($animal['photo']) ?>" />
                <div class="slide-text">Nom : <?= htmlentities($animal['nom']) ?> | Race : <?= htmlentities($animal['race']) ?> | Age : <?= (int)$animal['age'] ?></div>
            </a>
        <?php endforeach ?>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>

    <br>

    <div class="slide-dot">
        <?php for ($i = 1; $i <= ($unit - 1); $i++) : ?>
            <span class="dot" onclick="currentSlide(<?= $i ?>)"></span>
        <?php endfor ?>
    </div>

    <hr>

    <br>
    <br>
    <h3>Les nouveaux venus de ces 30 derniers jours !</h3>
    <table class="rwd-table">
        <tbody>
            <tr>
                <th>Photo</th>
                <th>Nom</th>
                <th>Age</th>
                <th>Race</th>
                <th>Intéraction</th>
            </tr>
            <?php foreach ($lesAnimaux30DerniersJours as $animal): ?>
                <tr class="laLigneAnimal">
                    <td data-th="Photo">
                        <img height="100" width="100" alt="Image de l'animal en grand" src="<?= htmlspecialchars($animal['photo']) ?>">
                    </td>
                    <td data-th="Nom">
                        <?= htmlentities($animal['nom']) ?>
                    </td>
                    <td data-th="Age">
                        <?= (int)$animal['age'] ?>
                    </td>
                    <td data-th="Race">
                        <?= htmlentities($animal['race']) ?>
                    </td>
                    <td data-th="Intéraction">
                        <a href="index.php?page=consulterAnimal&id=<?= (int)$animal['id'] ?>" class="btnDon see"><i class="fa-solid fa-eye"></i></a>
                        <?php if ($connecte): ?>
                            <a href="index.php?page=modifierAnimal&id=<?= (int)$animal['id'] ?>" class="btnDon edit"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="index.php?page=supprimerAnimal&id=<?= (int)$animal['id'] ?>" class="btnDon delete"><i class="fa-solid fa-trash"></i></a>
                        <?php endif ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("custom-slider");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
    }
</script>