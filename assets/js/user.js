let form = document.querySelector('#ModifieProfilButton');
let confirm = document.querySelector('#confirmModification');
let input = document.querySelectorAll('.personnalInfo');
let canTransfrom = true



form.addEventListener('click', () => {
    if (canTransfrom) {
        form.textContent = 'annuler la modification';
        input.forEach(element => {
            element.removeAttribute('disabled');
        });
        confirm.style.display = 'block';
        canTransfrom = false;
    } else {
        form.textContent = 'modifier le profil';
        input.forEach(element => {
            element.setAttribute('disabled', '');
        })
        confirm.style.display = 'none';
        canTransfrom = true;
    }

})

// pour la modal


//pour la modal
// On récupère le bouton qui ouvre la fenêtre modale
const openModalBtn = document.getElementsByClassName("open-modal-btn");

// On récupère la fenêtre modale et le bouton pour la fermer
const modal = document.getElementById("modal");
const closeBtn = document.getElementsByClassName("close-btn")[0];

for (let om of openModalBtn) {

    // On ajoute un écouteur d'événement sur le clic du bouton pour ouvrir la fenêtre modale
    om.addEventListener("click", function (e) {
        modal.style.display = "block";
        deleteArticle.value = e.target.getAttribute('idarticle');
    });
}

// On ajoute un écouteur d'événement sur le clic du bouton pour fermer la fenêtre modale
closeBtn.addEventListener("click", function () {
    modal.style.display = "none";
});

// On ajoute un écouteur d'événement pour fermer la fenêtre modale si l'utilisateur clique en dehors de la fenêtre
window.addEventListener("click", function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
});




