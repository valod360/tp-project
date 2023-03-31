document.getElementById('annuler').addEventListener('click', function() {
    // envoyer une requête au serveur via AJAX
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // afficher la réponse du serveur
            alert('la reservation a été annuler');
        }
    };
    xhr.open('POST', '../controllers/reservationsController.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('submit=true');
});