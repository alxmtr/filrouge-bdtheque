/* Fermeture des notifications */

buttonsDel = document.getElementsByClassName('delete');

for (var i = 0; i < buttonsDel.length; i++) {
  buttonsDel[i].addEventListener('click', removeParent);
}

// Supprime l'élément parent (la notification).
function removeParent(e) {
  e.target.parentNode.remove();
}


/* Boîte de confirmation avant suppression */

admButtonsDel = document.getElementsByClassName('btn-delete');

for (var i = 0; i < admButtonsDel.length; i++) {
    admButtonsDel[i].addEventListener('click', confirmDialog);
}

/**
 * Affiche une boîte de confirmation et stop l'action du formulaire 
 * si la réponse est négative.
 */
function confirmDialog(e) {
    if (!confirm("Souhaitez vous vraiment supprimer cet élément ?")) {
        e.preventDefault();
    }
}
