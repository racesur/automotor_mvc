document.addEventListener("DOMContentLoaded", function () {
    iniciarApp();
});

function iniciarApp() {
    buscarPorFecha();
}
//Función para buscar las citas agendadas por fechas
function buscarPorFecha() {

    const fechaInput = document.querySelector("#fecha");
    fechaInput.addEventListener("input", function (e) {
        const fechaSeleccionada = e.target.value;
        //Enviamos la fecha seleccionada por el usuario a la url por el método get (query string)
        window.location = `?fecha=${fechaSeleccionada}`;
    });
}