$(document).ready(function() {
    let currentImageIndex = 0;
    const images = $('.image-container');

    function updateDisplayedImage() {
        images.hide();
        $(images[currentImageIndex]).show();
    }

    $('.arrow-left').click(function() {
        currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
        updateDisplayedImage();
    });

    $('.arrow-right').click(function() {
        currentImageIndex = (currentImageIndex + 1) % images.length;
        updateDisplayedImage();
    });

    updateDisplayedImage();
});