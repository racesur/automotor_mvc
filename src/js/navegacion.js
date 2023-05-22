document.addEventListener("DOMContentLoaded", function () {
    navegacionFija(); // Funcionalidad Barra Navegación Fija

});
// Creamos un método para que la barra de navegación se mantenga fija en la parte superior de la página cuando se haga scroll hacia abajo
function navegacionFija() {
    // Creamos las constantes que usaremos para el método
    const barra = document.querySelector('.header2');
    const barraFija = document.querySelector('.barra-fija');
    const body = document.querySelector('body');

    // Añadimos un listener al evento scroll y cuando sea negativo añadirá la clase fijo y cuando sea 0 o mayor eliminará la clase fijo
    window.addEventListener('scroll', function () {
        if (barraFija.getBoundingClientRect().bottom < 0) {
            barra.classList.add('fijo');
            body.classList.add('body-scroll');
        } else {
            barra.classList.remove('fijo');
            body.classList.remove('body-scroll');
        }
    });
}