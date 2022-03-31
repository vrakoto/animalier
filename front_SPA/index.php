<div class='container'>
    <h2>Aidez-nous à leur offrir une nouvelle vie</h2>
    <div class="totalDons"><?= $totalDons ?> € de dons récoltés.</div>

    <form method="post" class="donnations">
        <div class="title-don">Mon Don</div>
        <div class="allprice">
            <div class="first-line">
                <div>50</div>
                <div>80</div>
                <div>100</div>
                <div>120</div>
            </div>

            <div class="sd-line">
                <div>150</div>
                <div>300</div>
                <div>500</div>
                <div>1000</div>
            </div>
        </div>

        <div class="montant-libre">
            <input type="number" name="montant" id="montant" placeholder="Montant libre" min="0.01" step="0.01">
            <div>€</div>
        </div>
        <button type="submit" class="btnDon">Donner</button>
    </form>
    <div class="slide-container">
        <?php foreach ($lesAnimaux as $animal) : ?>
            <a href="index.php?page=consulterAnimal&id=<?= (int)$animal['id'] ?>" class="custom-slider fade">
                <div class="slide-index"><?= $unit++ ?> / <?= count($lesAnimaux) ?></div>
                <img class="slide-img" src="data:image/jpeg;base64,<?= base64_encode($animal['photo']) ?>" />
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