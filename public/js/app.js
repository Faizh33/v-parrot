document.addEventListener('DOMContentLoaded', function () {
    var navbarToggler = document.querySelector('.navbar-toggler');
    var iconsToHide = document.querySelectorAll('.navbar-person, .navbar-telephone');

    navbarToggler.addEventListener('click', function () {
        for (var i = 0; i < iconsToHide.length; i++) {
            iconsToHide[i].classList.toggle('hidden');
        }
    });
});