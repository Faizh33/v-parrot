//Comportement de la navbar en mode mobile
document.addEventListener('DOMContentLoaded', function () {
    var navbarToggler = document.querySelector('.navbar-toggler');
    var iconsToHide = document.querySelectorAll('.navbar-person, .navbar-telephone');

    navbarToggler.addEventListener('click', function () {
        for (var i = 0; i < iconsToHide.length; i++) {
            iconsToHide[i].classList.toggle('hidden');
        }
    });
});

//Affichage d'un message au survol de l'icone de connexion/deconnexion
document.addEventListener('DOMContentLoaded', function () {
    // Sélectionnez l'élément de l'image et le message de déconnexion
    const profileImage = document.getElementById('profile-image');
    const logoutMessage = document.getElementById('logout-message');

    // Vérifiez si l'élément du message de déconnexion est présent dans le DOM (en fonction de la classe "desktop-only")
    if (logoutMessage) {
        // Ajoutez un gestionnaire d'événements pour le survol de l'image
        profileImage.addEventListener('mouseover', () => {
            logoutMessage.style.display = 'block';
        });

        // Ajoutez un gestionnaire d'événements pour le déplacement du curseur hors de l'image
        profileImage.addEventListener('mouseout', () => {
            logoutMessage.style.display = 'none';
        });
    }
});