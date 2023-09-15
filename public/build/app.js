(self["webpackChunk"] = self["webpackChunk"] || []).push([["app"],{

/***/ "./public/js/app.js":
/*!**************************!*\
  !*** ./public/js/app.js ***!
  \**************************/
/***/ (() => {

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
  var profileImage = document.getElementById('profile-image');
  var logoutMessage = document.getElementById('logout-message');

  // Vérifiez si l'élément du message de déconnexion est présent dans le DOM (en fonction de la classe "desktop-only")
  if (logoutMessage) {
    // Ajoutez un gestionnaire d'événements pour le survol de l'image
    profileImage.addEventListener('mouseover', function () {
      logoutMessage.style.display = 'block';
    });

    // Ajoutez un gestionnaire d'événements pour le déplacement du curseur hors de l'image
    profileImage.addEventListener('mouseout', function () {
      logoutMessage.style.display = 'none';
    });
  }
});

/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ var __webpack_exports__ = (__webpack_exec__("./public/js/app.js"));
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiYXBwLmpzIiwibWFwcGluZ3MiOiI7Ozs7Ozs7O0FBQUE7QUFDQUEsUUFBUSxDQUFDQyxnQkFBZ0IsQ0FBQyxrQkFBa0IsRUFBRSxZQUFZO0VBQ3RELElBQUlDLGFBQWEsR0FBR0YsUUFBUSxDQUFDRyxhQUFhLENBQUMsaUJBQWlCLENBQUM7RUFDN0QsSUFBSUMsV0FBVyxHQUFHSixRQUFRLENBQUNLLGdCQUFnQixDQUFDLG1DQUFtQyxDQUFDO0VBRWhGSCxhQUFhLENBQUNELGdCQUFnQixDQUFDLE9BQU8sRUFBRSxZQUFZO0lBQ2hELEtBQUssSUFBSUssQ0FBQyxHQUFHLENBQUMsRUFBRUEsQ0FBQyxHQUFHRixXQUFXLENBQUNHLE1BQU0sRUFBRUQsQ0FBQyxFQUFFLEVBQUU7TUFDekNGLFdBQVcsQ0FBQ0UsQ0FBQyxDQUFDLENBQUNFLFNBQVMsQ0FBQ0MsTUFBTSxDQUFDLFFBQVEsQ0FBQztJQUM3QztFQUNKLENBQUMsQ0FBQztBQUNOLENBQUMsQ0FBQzs7QUFFRjtBQUNBVCxRQUFRLENBQUNDLGdCQUFnQixDQUFDLGtCQUFrQixFQUFFLFlBQVk7RUFDdEQ7RUFDQSxJQUFNUyxZQUFZLEdBQUdWLFFBQVEsQ0FBQ1csY0FBYyxDQUFDLGVBQWUsQ0FBQztFQUM3RCxJQUFNQyxhQUFhLEdBQUdaLFFBQVEsQ0FBQ1csY0FBYyxDQUFDLGdCQUFnQixDQUFDOztFQUUvRDtFQUNBLElBQUlDLGFBQWEsRUFBRTtJQUNmO0lBQ0FGLFlBQVksQ0FBQ1QsZ0JBQWdCLENBQUMsV0FBVyxFQUFFLFlBQU07TUFDN0NXLGFBQWEsQ0FBQ0MsS0FBSyxDQUFDQyxPQUFPLEdBQUcsT0FBTztJQUN6QyxDQUFDLENBQUM7O0lBRUY7SUFDQUosWUFBWSxDQUFDVCxnQkFBZ0IsQ0FBQyxVQUFVLEVBQUUsWUFBTTtNQUM1Q1csYUFBYSxDQUFDQyxLQUFLLENBQUNDLE9BQU8sR0FBRyxNQUFNO0lBQ3hDLENBQUMsQ0FBQztFQUNOO0FBQ0osQ0FBQyxDQUFDIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcHVibGljL2pzL2FwcC5qcyJdLCJzb3VyY2VzQ29udGVudCI6WyIvL0NvbXBvcnRlbWVudCBkZSBsYSBuYXZiYXIgZW4gbW9kZSBtb2JpbGVcclxuZG9jdW1lbnQuYWRkRXZlbnRMaXN0ZW5lcignRE9NQ29udGVudExvYWRlZCcsIGZ1bmN0aW9uICgpIHtcclxuICAgIHZhciBuYXZiYXJUb2dnbGVyID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLm5hdmJhci10b2dnbGVyJyk7XHJcbiAgICB2YXIgaWNvbnNUb0hpZGUgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKCcubmF2YmFyLXBlcnNvbiwgLm5hdmJhci10ZWxlcGhvbmUnKTtcclxuXHJcbiAgICBuYXZiYXJUb2dnbGVyLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgZnVuY3Rpb24gKCkge1xyXG4gICAgICAgIGZvciAodmFyIGkgPSAwOyBpIDwgaWNvbnNUb0hpZGUubGVuZ3RoOyBpKyspIHtcclxuICAgICAgICAgICAgaWNvbnNUb0hpZGVbaV0uY2xhc3NMaXN0LnRvZ2dsZSgnaGlkZGVuJyk7XHJcbiAgICAgICAgfVxyXG4gICAgfSk7XHJcbn0pO1xyXG5cclxuLy9BZmZpY2hhZ2UgZCd1biBtZXNzYWdlIGF1IHN1cnZvbCBkZSBsJ2ljb25lIGRlIGNvbm5leGlvbi9kZWNvbm5leGlvblxyXG5kb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKCdET01Db250ZW50TG9hZGVkJywgZnVuY3Rpb24gKCkge1xyXG4gICAgLy8gU8OpbGVjdGlvbm5leiBsJ8OpbMOpbWVudCBkZSBsJ2ltYWdlIGV0IGxlIG1lc3NhZ2UgZGUgZMOpY29ubmV4aW9uXHJcbiAgICBjb25zdCBwcm9maWxlSW1hZ2UgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgncHJvZmlsZS1pbWFnZScpO1xyXG4gICAgY29uc3QgbG9nb3V0TWVzc2FnZSA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdsb2dvdXQtbWVzc2FnZScpO1xyXG5cclxuICAgIC8vIFbDqXJpZmlleiBzaSBsJ8OpbMOpbWVudCBkdSBtZXNzYWdlIGRlIGTDqWNvbm5leGlvbiBlc3QgcHLDqXNlbnQgZGFucyBsZSBET00gKGVuIGZvbmN0aW9uIGRlIGxhIGNsYXNzZSBcImRlc2t0b3Atb25seVwiKVxyXG4gICAgaWYgKGxvZ291dE1lc3NhZ2UpIHtcclxuICAgICAgICAvLyBBam91dGV6IHVuIGdlc3Rpb25uYWlyZSBkJ8OpdsOpbmVtZW50cyBwb3VyIGxlIHN1cnZvbCBkZSBsJ2ltYWdlXHJcbiAgICAgICAgcHJvZmlsZUltYWdlLmFkZEV2ZW50TGlzdGVuZXIoJ21vdXNlb3ZlcicsICgpID0+IHtcclxuICAgICAgICAgICAgbG9nb3V0TWVzc2FnZS5zdHlsZS5kaXNwbGF5ID0gJ2Jsb2NrJztcclxuICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgLy8gQWpvdXRleiB1biBnZXN0aW9ubmFpcmUgZCfDqXbDqW5lbWVudHMgcG91ciBsZSBkw6lwbGFjZW1lbnQgZHUgY3Vyc2V1ciBob3JzIGRlIGwnaW1hZ2VcclxuICAgICAgICBwcm9maWxlSW1hZ2UuYWRkRXZlbnRMaXN0ZW5lcignbW91c2VvdXQnLCAoKSA9PiB7XHJcbiAgICAgICAgICAgIGxvZ291dE1lc3NhZ2Uuc3R5bGUuZGlzcGxheSA9ICdub25lJztcclxuICAgICAgICB9KTtcclxuICAgIH1cclxufSk7Il0sIm5hbWVzIjpbImRvY3VtZW50IiwiYWRkRXZlbnRMaXN0ZW5lciIsIm5hdmJhclRvZ2dsZXIiLCJxdWVyeVNlbGVjdG9yIiwiaWNvbnNUb0hpZGUiLCJxdWVyeVNlbGVjdG9yQWxsIiwiaSIsImxlbmd0aCIsImNsYXNzTGlzdCIsInRvZ2dsZSIsInByb2ZpbGVJbWFnZSIsImdldEVsZW1lbnRCeUlkIiwibG9nb3V0TWVzc2FnZSIsInN0eWxlIiwiZGlzcGxheSJdLCJzb3VyY2VSb290IjoiIn0=