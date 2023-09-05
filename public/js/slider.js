function setDoubleRange(configDoubleRange) {
    // Configuration du module :
    const doubleRange = configDoubleRange.element;
    const minValue = configDoubleRange.minValue;
    const maxValue = configDoubleRange.maxValue;
    const maxInfinite = configDoubleRange.maxInfinite;
    const stepValue = configDoubleRange.stepValue;
    const unite = configDoubleRange.unite;
    const defaultMinValue = configDoubleRange.defaultMinValue;
    const defaultMaxValue = configDoubleRange.defaultMaxValue;

    const barre = doubleRange.querySelector('.barre');
    const barreMilieu = doubleRange.querySelector('.barreMilieu');
    const thumb1 = doubleRange.querySelector('.t1');
    const thumb2 = doubleRange.querySelector('.t2');

    const draggable = false;
    const targetToMove = false;
    const largeurBarre = barre.scrollWidth;
    const margeLeftBarre = barre.getBoundingClientRect().left;

    // Gestion des événements pour les curseurs et le déplacement
    thumb1.addEventListener("mousedown", dragStart, false);
    thumb2.addEventListener("mousedown", dragStart, false);
    doubleRange.addEventListener("mousemove", drag, false);
    doubleRange.addEventListener("mousedown", clickBar, false);
    document.addEventListener("mouseup", dragStop, false);

    // Gestion des événements tactiles pour les curseurs et le déplacement
    thumb1.addEventListener("touchstart", dragStart, false);
    thumb2.addEventListener("touchstart", dragStart, false);
    doubleRange.addEventListener("touchmove", drag, false);
    doubleRange.addEventListener("touchstart", clickBar, false);
    document.addEventListener("touchend", dragStop, false);

    // Définir les valeurs par défaut si elles sont spécifiées
    setDefaultValues();

    // Fonction pour démarrer le déplacement du curseur
    function dragStart(e) {
        draggable = true;
        targetToMove = e.target.className.split(' ')[0];
        largeurBarre = barre.scrollWidth;
        margeLeftBarre = barre.getBoundingClientRect().left;
    }

    // Fonction pour arrêter le déplacement du curseur
    function dragStop() {
        draggable = false;
        targetToMove = false;
    }

    // Fonction pour gérer le déplacement du curseur
    function drag(e) {
        if (draggable && targetToMove != false) {
            let thumbToMove = doubleRange.querySelector('.' + targetToMove);
            let x = e.clientX;
            if (e.type === 'touchmove') {
                x = e.touches[0].clientX;
            }
            let pourcentage = ((x - margeLeftBarre) * 100) / largeurBarre;

            if (pourcentage <= 0 || pourcentage >= 100) {
                return false;
            }

            thumbToMove.style.left = pourcentage + '%';

            majBarreMilieuETLabels();
        }
    }

    // Fonction pour gérer le clic sur la barre pour déplacer les curseurs
    function clickBar(e) {
        let x = e.clientX;
        if (e.type === 'touchmove') {
            x = e.touches[0].clientX;
        }
        let pourcentage = ((x - margeLeftBarre) * 100) / largeurBarre;

        let percentThumb1 = parseInt(thumb1.style.left);
        let percentThumb2 = parseInt(thumb2.style.left);

        if (Math.abs(percentThumb1 - pourcentage) <= Math.abs(percentThumb2 - pourcentage)) {
            thumb1.style.left = pourcentage + '%';
        } else {
            thumb2.style.left = pourcentage + '%';
        }

        majBarreMilieuETLabels();
    }

    // Fonction pour définir les valeurs par défaut si elles sont spécifiées
    function setDefaultValues() {
        if (typeof defaultMinValue === 'undefined' || typeof defaultMaxValue === 'undefined') {
            return false;
        }
        if (defaultMinValue < minValue || defaultMinValue > maxValue || defaultMaxValue < minValue || defaultMaxValue > maxValue) {
            return false;
        }

        thumb1.style.left = convertionValueToPercent(defaultMinValue) + '%';
        thumb2.style.left = convertionValueToPercent(defaultMaxValue) + '%';
        majBarreMilieuETLabels();
    }

    // Fonction pour mettre à jour la barre milieu et les labels
    function majBarreMilieuETLabels() {
        let pourcentageT1 = parseFloat(thumb1.style.left);
        let pourcentageT2 = parseFloat(thumb2.style.left);
        let labelMin = doubleRange.querySelector('.labelMin');
        let labelMax = doubleRange.querySelector('.labelMax');
        let inputMin = doubleRange.querySelector('.inputMin');
        let inputMax = doubleRange.querySelector('.inputMax');

        let pourcentageMin = pourcentageMax = 0;
        if (pourcentageT1 <= pourcentageT2) {
            pourcentageMin = pourcentageT1;
            pourcentageMax = pourcentageT2;
        } else {
            pourcentageMin = pourcentageT2;
            pourcentageMax = pourcentageT1;
        }

        barreMilieu.style.left = pourcentageMin + '%';
        barreMilieu.style.width = (pourcentageMax - pourcentageMin) + '%';

        labelMin.textContent = convertionPercentToValue(pourcentageMin);
        labelMax.textContent = convertionPercentToValue(pourcentageMax);

        inputMin.value = convertionPercentToValue(pourcentageMin, false);
        inputMax.value = convertionPercentToValue(pourcentageMax, false);

        if (pourcentageMax > 99 && maxInfinite == true) {
            labelMax.textContent = '∞';
            inputMax.value = '';
        }
    }

    // Fonction pour convertir le pourcentage en valeur
    function convertionPercentToValue(pourcentage, afficherUnite = true) {
        let resPFV = ((pourcentage * (maxValue - minValue)) / 100) + minValue;
        resPFV = Math.round(resPFV / stepValue) * stepValue;
        if (afficherUnite) {
            resPFV = resPFV + ' ' + unite;
        }

        return resPFV;
    }

    // Fonction pour convertir la valeur en pourcentage
    function convertionValueToPercent(value) {
        let resPercent = ((value - minValue) * 100) / (maxValue - minValue);
        return resPercent;
    }
}
