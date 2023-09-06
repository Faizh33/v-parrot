document.addEventListener("DOMContentLoaded", function () {
    const milageRange = document.querySelector('.milageRange');
    const priceRange = document.querySelector('.priceRange');
    const yearRange = document.querySelector('.yearRange');
    const toggleButton = document.querySelector('.filter-button');
    const svgButton = document.querySelector('.filter-button-svg');

    // Fonction pour afficher le bouton
    function showButton() {
        toggleButton.style.visibility = 'visible'; 
    }

    // Fonction pour masquer le bouton
    function hideButton() {
        toggleButton.style.visibility = 'hidden'; 
    }

    // Fonction pour afficher les filtres
    function showFilters() {
        milageRange.style.display = 'block';
        priceRange.style.display = 'block';
        yearRange.style.display = 'block';
        toggleButton.textContent = 'Masquer les filtres';
    }

    // Fonction pour masquer les filtres
    function hideFilters() {
        milageRange.style.display = 'none';
        priceRange.style.display = 'none';
        yearRange.style.display = 'none';
        toggleButton.textContent = 'Filtrer';
    }

    // Écouteur d'événement pour le bouton "Filtrer"
    toggleButton.addEventListener('click', function () {
        if (milageRange.style.display === 'none') {
            showFilters();
        } else {
            hideFilters();
        }
    });

    // Ajoutez un gestionnaire d'événements au SVG
    svgButton.addEventListener('click', function () {
        if (milageRange.style.display === 'none') {
            showFilters();
        } else {
            hideFilters();
        }
    });

    // Vérifiez la largeur de l'écran au chargement de la page
    function checkScreenSize() {
        if (window.innerWidth <= 768) {
            showButton(); 
            hideFilters(); 
        } else {
            hideButton(); 
            showFilters();
        }
    }

    checkScreenSize(); // Appel initial

    // Écoutez les changements de taille de l'écran
    window.addEventListener('resize', checkScreenSize);
});