document.addEventListener("DOMContentLoaded", function () {
	eventListeners(); // Crear dinamismo en el formulario de contacto
	// darkMode(); // TODO - Tema oscuro para el sitio Web

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

	//Añade el evento clic en cada input (hay 2)
	// metodoContacto.forEach((input) =>
	// 	input.addEventListener("click", mostrarMetodosContacto())
	// );
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