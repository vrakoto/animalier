function afficherRenseignementAdoption() {
    document.querySelector('.ficheRenseignements').style.visibility = "visible";
}

const lesPrix = document.querySelectorAll('.price');
for (let index = 0; index < lesPrix.length; index++) {
    const element = lesPrix[index];
    element.addEventListener('click', function () {
        document.getElementById("montant").value = this.textContent;
    });
}