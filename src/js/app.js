document.addEventListener("DOMContentLoaded", function () {
	eventListeners(); // Crear dinamismo en el formulario de contacto
	darkMode(); // Tema oscuro para el sitio Web
	navegacionFija(); // Funcionalidad Barra Navegación Fija

});

// Formulario de Contacto y Menú Hamburguesa
function eventListeners() {
	const mobileMenu = document.querySelector(".mobile-menu");

	mobileMenu.addEventListener("click", navegacionResponsive);

	//Muestra campos condicionales
	//Como comparten el atributo name(se llaman igual contacto)puedo selecc los 2 a la vez
	const metodoContacto = document.querySelectorAll(
		'input[name="contacto[contacto]"]'
	);

	metodoContacto.forEach((input) =>
		input.addEventListener("click", mostrarMetodosContacto)
	);
}

// Muestra u oculta los enlaces de la barra de navegación
function navegacionResponsive() {
	const navegacion = document.querySelector(".navegacion");

	navegacion.classList.toggle("mostrar");
}

// Método para ocultar/mostrar campos del formulario de Contacto
function mostrarMetodosContacto(e) {
	const contactoDiv = document.querySelector("#contacto");

	if (e.target.value === "telefono") {
		contactoDiv.innerHTML = `
		<label for="telefono">Número de Teléfono</label>
		<input type="tel" placeholder="Tu Teléfono" id="telefono" name="contacto[telefono]">

		<p>Elija la fecha y la hora para la llamada</p>

		<label for="fecha">Fecha:</label>
		<input type="date" id="fecha" name="contacto[fecha]">

		<label for="hora">Hora:</label>
		<input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]">

		`;
	} else {
		contactoDiv.innerHTML = `
		<label for="email">E-mail</label>
		<input type="email" placeholder="Tu Email" id="email" name="contacto[email]">
		
		`;
	}

}

function darkMode() {
	const prefiereDarkMode = window.matchMedia("(prefers-color-scheme: dark)");// Comprobamos si el usuario tiene seleccionado "Tema Oscuro" en su sistema operativo.
	// Si el usuario tiene seleccionado "Tema Oscuro" en su sistema operativo añadimos la clase "dark-mode", sino la borramos.
	if (prefiereDarkMode.matches) {
		document.body.classList.add("dark-mode");
	} else {
		document.body.classList.remove("dark-mode");
	}
	//Creamos un listener de tipo "change" para que si el usuario o el sistema cambia el modo a oscuro, la página web lo refleje automáticamente
	prefiereDarkMode.addEventListener("change", function () {
		if (prefiereDarkMode.matches) {
			document.body.classList.add("dark-mode");
		} else {
			document.body.classList.remove("dark-mode");
		}
	});

	// Añadimos un evento al icono del tema oscuro de la barra de navegación para que al pulsar sobre él se añada o se quite la clase "dark-mode", eso lo hacemos con toggle
	const botonDarkMode = document.querySelector(".dark-mode-boton");
	botonDarkMode.addEventListener("click", function () {
		document.body.classList.toggle("dark-mode");
	});
}

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