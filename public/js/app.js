//Comportement de la navbar en mode mobile
document.addEventListener('DOMContentLoaded', function () {
    const navbarToggler = document.querySelector('.navbar-toggler');
    const iconsToHide = document.querySelectorAll('.navbar-person, .navbar-telephone');

    navbarToggler.addEventListener('click', function () {
        for (let i = 0; i < iconsToHide.length; i++) {
            iconsToHide[i].classList.toggle('hidden');
        }
    });
});

//Affichage d'un message au survol de l'icone de connexion/deconnexion
document.addEventListener('DOMContentLoaded', function () {
    // Sélectionner l'élément de l'image et le message de déconnexion
    const profileImage = document.getElementById('profile-image');
    const logoutMessage = document.getElementById('logout-message');

    // Vérifier si l'élément du message de déconnexion est présent dans le DOM (en fonction de la classe "desktop-only")
    if (logoutMessage) {
        // Ajouter un gestionnaire d'événements pour le survol de l'image
        profileImage.addEventListener('mouseover', () => {
            logoutMessage.style.display = 'block';
        });

        // Ajouter un gestionnaire d'événements pour le déplacement du curseur hors de l'image
        profileImage.addEventListener('mouseout', () => {
            logoutMessage.style.display = 'none';
        });
    }
});

//Vérification lors de la soumission du formulaire d'avis (étoiles)
document.getElementById('review-form').addEventListener('submit', function(event) {
    const ratingRadios = document.querySelectorAll('#star-rating input[type="radio"]');
    const isRatingSelected = false;

    // Vérifier si au moins un bouton est coché
    for (let i = 0; i < ratingRadios.length; i++) {
        if (ratingRadios[i].checked) {
            isRatingSelected = true;
            break;
        }
    }

    // Si aucune note n'a été sélectionnée
    if (!isRatingSelected) {
        const errorContainer = document.querySelector('.error-message');
        if (errorContainer) {
            errorContainer.style.display = 'block';
        }
        event.preventDefault();
    }
});
