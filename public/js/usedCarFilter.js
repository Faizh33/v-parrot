// Sélectionner les éléments des curseurs
const thumb1 = document.getElementById('t1Milage');
const thumb2 = document.getElementById('t2Milage');
const thumb3 = document.getElementById('t1Price');
const thumb4 = document.getElementById('t2Price');
const thumb5 = document.getElementById('t1Year');
const thumb6 = document.getElementById('t2Year');

// Récupérer les valeurs minimum et maximum
const minMilageElement = document.getElementById('minMilage');
const maxMilageElement = document.getElementById('maxMilage');
const minPriceElement = document.getElementById('minPrice');
const maxPriceElement = document.getElementById('maxPrice');
const minYearElement = document.getElementById('minYear');
const maxYearElement = document.getElementById('maxYear');

// Fonction pour extraire la valeur en kilomètres à partir de l'élément HTML
function extractValue(element) {
    let text = element.textContent;
    let value = parseInt(text);
    return value;
}

// Récupérer les valeurs minimum et maximum à partir des éléments HTML
let minMilage = extractValue(minMilageElement);
let maxMilage = extractValue(maxMilageElement);
let minPrice = extractValue(minPriceElement);
let maxPrice = extractValue(maxPriceElement);
let minYear = extractValue(minYearElement);
let maxYear = extractValue(maxYearElement);

// Ajouter des écouteurs d'événements "mousemove" pour les curseurs
thumb1.addEventListener('mousemove', handleRangeChange);
thumb2.addEventListener('mousemove', handleRangeChange);
thumb3.addEventListener('mousemove', handleRangeChange);
thumb4.addEventListener('mousemove', handleRangeChange);
thumb5.addEventListener('mousemove', handleRangeChange);
thumb6.addEventListener('mousemove', handleRangeChange);

// Ajouter des écouteurs d'événements "touchmove" pour la prise en charge des appareils tactiles
thumb1.addEventListener('touchmove', handleRangeChange);
thumb2.addEventListener('touchmove', handleRangeChange);
thumb3.addEventListener('touchmove', handleRangeChange);
thumb4.addEventListener('touchmove', handleRangeChange);
thumb5.addEventListener('touchmove', handleRangeChange);
thumb6.addEventListener('touchmove', handleRangeChange);

// Fonction pour gérer les changements de position des curseurs
function handleRangeChange() {
    console.log('Mousemove event triggered');
    // Récupérer les valeurs actuelles des curseurs en kilomètres
    let minValueKm = extractValue(minMilageElement);
    let maxValueKm = extractValue(maxMilageElement);
    let minValuePrice = extractValue(minPriceElement);
    let maxValuePrice = extractValue(maxPriceElement);
    let minValueYear = extractValue(minYearElement);
    let maxValueYear = extractValue(maxYearElement);

    // Mettre à jour les valeurs
    minMilage = minValueKm;
    maxMilage = maxValueKm;
    minPrice = minValuePrice;
    maxPrice = maxValuePrice;
    minYear = minValueYear;
    maxYear = maxValueYear;

    // Mettre à jour l'affichage des résultats
    updateResults();
}

// Fonction pour filtrer les voitures en fonction de la plage de kilométrage
function filterCarsByKm(minValue, maxValue) {
    // Récupérer toutes les voitures
    let allCars = document.querySelectorAll('.used-car-container');
    // Filtrer les voitures en fonction de la plage de kilométrage
    let filteredCarsKm = [];
    for (let i = 0; i < allCars.length; i++) {
        let car = allCars[i];
        // Sélectionner l'élément contenant le kilométrage
        let milageElement = car.querySelector('.kilometer-value');
        // Obtenir le texte du kilométrage
        let milageText = milageElement.textContent;
        // Convertir le texte en nombre
        let milage = parseInt(milageText);
        if (!isNaN(milage) && milage >= minMilage && milage <= maxMilage) {
            filteredCarsKm.push(car);
        }
    }    
    return filteredCarsKm;
}

// Fonction pour filtrer les voitures en fonction de la plage des prix
function filterCarsByPrice(minValue, maxValue) {
    // Récupérer toutes les voitures
    let allCars = document.querySelectorAll('.used-car-container');
    // Filtrer les voitures en fonction de la plage des prix
    let filteredCarsPrice = [];
    for (let i = 0; i < allCars.length; i++) {
        let car = allCars[i];
        // Sélectionner l'élément contenant le prix
        let priceElement = car.querySelector('.price-value');
        // Obtenir le texte du prix
        let priceText = priceElement.textContent;
        // Convertir le texte en nombre
        let price = parseInt(priceText);
        if (!isNaN(price) && price >= minPrice && price <= maxPrice) {
            filteredCarsPrice.push(car);
        }
    }    
    return filteredCarsPrice;
}

// Fonction pour filtrer les voitures en fonction de la plage des années
function filterCarsByYear(minValue, maxValue) {
    // Récupérer toutes les voitures
    let allCars = document.querySelectorAll('.used-car-container');
    // Filtrer les voitures en fonction de la plage des années
    let filteredCarsYear = [];
    for (let i = 0; i < allCars.length; i++) {
        let car = allCars[i];
        // Sélectionner l'élément contenant l'année
        let yearElement = car.querySelector('.year-value');
        // Obtenir le texte de l'année
        let yearText = yearElement.textContent;
        // Convertissez le texte en nombre
        let year = parseInt(yearText);
        if (!isNaN(year) && year >= minYear && year <= maxYear) {
            filteredCarsYear.push(car);
        }
    }    
    return filteredCarsYear;
}

// Fonction pour mettre à jour l'affichage des résultats
function updateResults() {
    // Récupérer toutes les voitures
    let allCars = document.querySelectorAll('.used-car-container');

    // Masquer toutes les voitures
    allCars.forEach(function(car) {
        car.style.display = 'none';
    });

    // Filtrer les voitures
    let filteredCarsKm = filterCarsByKm(minMilage, maxMilage);
    let filteredCarsPrice = filterCarsByPrice(minPrice, maxPrice);
    let filteredCarsYear = filterCarsByYear(minYear, maxYear);

    // Combiner les résultats des trois filtres
    let combinedResults = filteredCarsKm.filter(function(car) {
        return filteredCarsPrice.includes(car) && filteredCarsYear.includes(car);
    });

    // Afficher uniquement les voitures qui satisfont à tous les critères
    combinedResults.forEach(function(car) {
        car.style.display = 'block';
    });
}