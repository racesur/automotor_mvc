function eventListeners(){document.querySelector(".mobile-menu").addEventListener("click",navegacionResponsive);document.querySelectorAll('input[name="contacto[contacto]"]').forEach(e=>e.addEventListener("click",mostrarMetodosContacto))}function navegacionResponsive(){document.querySelector(".navegacion").classList.toggle("mostrar")}function mostrarMetodosContacto(e){const t=document.querySelector("#contacto");"telefono"===e.target.value?t.innerHTML='\n\t\t<label for="telefono">Número de Teléfono</label>\n\t\t<input type="tel" placeholder="Tu Teléfono" id="telefono" name="contacto[telefono]">\n\n\t\t<p>Elija la fecha y la hora para la llamada</p>\n\n\t\t<label for="fecha">Fecha:</label>\n\t\t<input type="date" id="fecha" name="contacto[fecha]">\n\n\t\t<label for="hora">Hora:</label>\n\t\t<input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]">\n\n\t\t':t.innerHTML='\n\t\t<label for="email">E-mail</label>\n\t\t<input type="email" placeholder="Tu Email" id="email" name="contacto[email]">\n\t\t\n\t\t'}function darkMode(){const e=window.matchMedia("(prefers-color-scheme: dark)");e.matches?document.body.classList.add("dark-mode"):document.body.classList.remove("dark-mode"),e.addEventListener("change",(function(){e.matches?document.body.classList.add("dark-mode"):document.body.classList.remove("dark-mode")}));document.querySelector(".dark-mode-boton").addEventListener("click",(function(){document.body.classList.toggle("dark-mode")}))}function navegacionFija(){const e=document.querySelector(".header2"),t=document.querySelector(".barra-fija"),o=document.querySelector("body");window.addEventListener("scroll",(function(){t.getBoundingClientRect().bottom<0?(e.classList.add("fijo"),o.classList.add("body-scroll")):(e.classList.remove("fijo"),o.classList.remove("body-scroll"))}))}document.addEventListener("DOMContentLoaded",(function(){eventListeners(),darkMode(),navegacionFija()}));