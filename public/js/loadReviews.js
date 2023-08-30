document.addEventListener("DOMContentLoaded", function () {
        const reviewsContainer = document.getElementById("reviews-container");
        const reviewItems = reviewsContainer.querySelectorAll(".review-item");
        const loadMoreButton = document.getElementById("load-more-button");

        const reviewsToShow = 3; // Nombre d'avis à afficher initialement
        let currentIndex = 0;

        function hideAllReviews() {
            for (let i = 0; i < reviewItems.length; i++) {
                reviewItems[i].style.display = "none"; // Masque tous les avis
            }
        }

        function showReviews(startIndex, endIndex) {
            for (let i = startIndex; i < endIndex && i < reviewItems.length; i++) {
                reviewItems[i].style.display = "block"; // Affiche l'élément de l'avis
            }
        }

        function loadMoreReviews() {
            const nextIndex = currentIndex + reviewsToShow;
            showReviews(currentIndex, nextIndex);
            currentIndex = nextIndex;

            if (currentIndex >= reviewItems.length) {
                loadMoreButton.style.display = "none"; // Masque le bouton si tous les avis ont été affichés
            }
        }

        loadMoreButton.addEventListener("click", loadMoreReviews);

        // Masque tous les avis au chargement de la page, puis montre les premiers à afficher
        hideAllReviews();
        showReviews(0, reviewsToShow);
    });