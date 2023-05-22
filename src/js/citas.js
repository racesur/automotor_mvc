let paso = 1; //elegimos que muestre primero el paso 1
const pasoInicial = 1; // Indicamos el paso inicial de la lista
const pasoFinal = 3; // Indicamos el paso final de la lista

//Creamos un objeto de tipo Cita
//Como necesitamos el id del usuario lo añado desde un campo oculto del formulario views index
const cita = {
    id: "",
    nombre: "",
    fecha: "",
    hora: "",
    servicios: [],
};

document.addEventListener("DOMContentLoaded", function () {
    iniciarApp();

});

function iniciarApp() {
    mostrarSeccion(); //Muestra y oculta las secciones
    tabs(); // Cambia la sección al pulsar los botones
    botonesPaginador(); // Agrega o quita los botones de avance y retroceso del paginador
    paginaSiguiente(); //Agrega la función para pasar a la seccion siguiente
    paginaAnterior(); //Agrega la función para pasar a la seccion anterior

    consultaAPI(); // Consulta la API en el Backend de PHP

    idCliente(); // Consulta el id del cliente en el Backend de PHP
    nombreCliente(); //Añade el nombre del cliente al objeto de cita
    seleccionarFecha(); // Añade la fecha de la cita al objeto de cita
    seleccionarHora(); // Añade la hora de la cita al objeto de cita

    mostrarResumen(); // Muestra el resumen de la cita
}

function mostrarSeccion() {
    //Ocultar la sección que tenga la clase de mostrar
    const seccionAnterior = document.querySelector(".mostrar"); //seleccionamos la que tenga la clase mostrar
    //si existe la sección anterior se la quitamos sino no hacemos nada
    if (seccionAnterior) {
        seccionAnterior.classList.remove("mostrar");
    }

    //Seleccionar la sección mediante el número de paso y le añadimos la clase de mostrar para que se vea
    const pasoSelector = `#paso-${paso}`;
    const seccion = document.querySelector(pasoSelector);
    seccion.classList.add("mostrar");

    //Quita la clase de actual al botón anterior
    const tabAnterior = document.querySelector(".actual");
    if (tabAnterior) {
        tabAnterior.classList.remove("actual");
    }

    //Resalta el botón actual que hemos pulsado
    const tab = document.querySelector(`[data-paso="${paso}"]`); //usamos el selector de atributos que es []
    tab.classList.add("actual"); //le añadimos la clase actual
}

function tabs() {
    const botones = document.querySelectorAll(".tabs button");

    botones.forEach((boton) => {
        boton.addEventListener("click", function (e) {
            e.preventDefault();

            paso = parseInt(e.target.dataset.paso);
            mostrarSeccion();

            //Mandamos llamar a la función del paginador
            botonesPaginador();
        });
    });
}

function botonesPaginador() {
    const paginaAnterior = document.querySelector("#anterior");
    const paginaSiguiente = document.querySelector("#siguiente");

    if (paso === 1) {
        paginaAnterior.classList.add("ocultar");
        paginaSiguiente.classList.remove("ocultar");
    } else if (paso === 3) {
        paginaAnterior.classList.remove("ocultar");
        paginaSiguiente.classList.add("ocultar");

        //Llamo a la función mostrarresumen porque el usuario puede ir a la última página con los botones de siguiente
        mostrarResumen();
    } else {
        paginaAnterior.classList.remove("ocultar");
        paginaSiguiente.classList.remove("ocultar");
    }

    mostrarSeccion(); //Muestra y oculta las secciones
}

function paginaAnterior() {
    //Seleccionamos el botón por el id
    const paginaAnterior = document.querySelector("#anterior");
    paginaAnterior.addEventListener("click", function () {
        if (paso <= pasoInicial) return; //Si el paso es menor o igual que el inicial, no hacemos nada
        paso--; // si no, vamos restando el número que aparezca en paso

        botonesPaginador(); //mostrará u ocultará los botones según el valor del paso
    });
}

function paginaSiguiente() {
    //Seleccionamos el botón por el id
    const paginaSiguiente = document.querySelector("#siguiente");
    paginaSiguiente.addEventListener("click", function () {
        if (paso >= pasoFinal) return; //Si el paso es igual o mayor que el final, no hacemos nada
        paso++; // si no, vamos sumando el número que aparezca en paso

        botonesPaginador(); //mostrará u ocultará los botones según el valor del paso
    });
}

async function consultaAPI() {
    try {
        const url = "http://localhost:3000/api/servicios"; //esta es la url que voy a consumir, la que tiene mi API
        const resultado = await fetch(url); // con await espera a que se descarguen todos los datos de la consulta antes de continuar con la ejecución
        const servicios = await resultado.json(); // le pasamos el resultado de la consulta a json
        mostrarServicios(servicios);
    } catch (error) {
        console.log(error);
    }
}

function mostrarServicios(servicios) {
    //El resultado que obtenemos es un array de objetos usamos foreach para iterar sobre ellos
    servicios.forEach((servicio) => {
        const { id, nombre, precio } = servicio; //de esta forma obtengo la variable y su valor

        const nombreServicio = document.createElement("P"); //Creamos un párrafo en HTML
        nombreServicio.classList.add("nombre-servicio"); //Le añado la clase nombre-servicio para darle estilos
        nombreServicio.textContent = nombre;

        const precioServicio = document.createElement("P");
        precioServicio.classList.add("precio-servicio");
        precioServicio.textContent = `${precio}€`;

        const servicioDiv = document.createElement("DIV");
        servicioDiv.classList.add("servicio");
        servicioDiv.dataset.idServicio = id;
        servicioDiv.onclick = function () {
            seleccionarServicio(servicio);
        };

        servicioDiv.appendChild(nombreServicio);
        servicioDiv.appendChild(precioServicio);

        document.querySelector("#servicios").appendChild(servicioDiv);
    });
}

function seleccionarServicio(servicio) {
    const { id } = servicio; //de esta forma extraigo el id del servicio seleccionado
    const { servicios } = cita; //Extraigo los servicios del objeto cita y lo sobreescribo

    // Identificamos el elemento al que se le da click
    const divServicio = document.querySelector(`[data-id-servicio="${id}"]`); //usamos el selector de atributos para seleccionar el id del servicio

    //Comprobar si un servicio ha sido seleccionado y quitarlo
    //Iteramos en el array y con some comprobamos si un elemento existe en el array porque devuelve true o false
    if (servicios.some((agregado) => agregado.id === id)) {
        //Si está agregado entonces lo eliminamos
        cita.servicios = servicios.filter((agregado) => agregado.id !== id);
        divServicio.classList.remove("seleccionado"); //le quitamos la clase seleccionado una vez que lo hemos quitado del array
    } else {
        //Si no está agregado lo añadimos al array de Servicios
        cita.servicios = [...servicios, servicio]; //Añadimos el servicio a la lista de servicios (estoy haciendo una copia con los tres puntos). Servicio es el objeto completo, mientras que Servicios es el objeto que tiene la información de la cita
        divServicio.classList.add("seleccionado"); //le añadimos la clase seleccionado una vez que lo hemos añadido al array
    }
}

function idCliente() {
    //Como ya tenemos el id del usuario que ha iniciado sesión, lo extraemos del formulario en el campo id
    const id = document.querySelector("#id").value;
    //añadimos el id al campo id del objeto cita
    cita.id = id;
}

function nombreCliente() {
    //Como ya tenemos el nombre del usuario que ha iniciado sesión, lo extraemos del formulario en el campo nombre
    const nombre = document.querySelector("#nombre").value;
    //añadimos el nombre al campo nombre del objeto cita
    cita.nombre = nombre;
}

function seleccionarFecha() {
    const inputFecha = document.querySelector("#fecha");
    inputFecha.addEventListener("input", function (e) {
        //Validamos para que no se puedan seleccionar días de fin de semana usando getUTCDay, domingo=0
        const dia = new Date(e.target.value).getUTCDay();

        //Usamos includes para comprobar si dentro del array que hemos creado se encuentra el día seleccionado. Si es así mostramos un mensaje para informar al usuario que no se abre en esa fecha
        if ([6, 0].includes(dia)) {
            //Como no queremos que aparezca la fecha, si es sab o domingo le asignamos un string vacío en el campo fecha para que usuario no pueda seleccionarla
            e.target.value = "";
            //Usamos una función para mostrarle un mensaje al usuario
            mostrarAlerta("Fines de semana no permitidos", "error", "#paso-2 p ");
        } else {
            cita.fecha = e.target.value; //añadimos la fecha al objeto cita en su campo fecha
        }
    });
}

function seleccionarHora() {
    const inputHora = document.querySelector("#hora");
    inputHora.addEventListener("input", function (e) {
        const horaCita = e.target.value;
        const hora = horaCita.split(":")[0]; //con el cero seleccionamos solo la hora y no los minutos
        if (hora < 10 || hora > 18) {
            e.target.value = "";
            //Mostramos una alerta si la hora no está en horario comercial
            mostrarAlerta("Hora No Válida", "error", "#paso-2 p ");
        } else {
            cita.hora = e.target.value;
        }
    });
}

function mostrarAlerta(mensaje, tipo, elemento, desaparece = true) {
    //Creamos una función para que sólo se cree una alerta y si ya existe que no crea más
    //Previene que se generen más de 1 alerta
    const alertaPrevia = document.querySelector(".alerta"); //seleccionamos la clase de alerta que sólo existirá si hay una alerta. si no hay devolverá null
    if (alertaPrevia) {
        //Si existe una alerta previa la elimina
        alertaPrevia.remove();
    }

    //Script para crear la alerta
    const alerta = document.createElement("DIV");
    alerta.textContent = mensaje;
    alerta.classList.add("alerta"); //le añado la clase de alerta
    alerta.classList.add(tipo); //le añado el tipo de alerta (error o exito)

    //Una vez creada la alerta la añadimos al HTML
    const referencia = document.querySelector(elemento); //seleccionamos el id paso-2
    referencia.appendChild(alerta); //añadimos la alerta al parrafo

    if (desaparece) {
        //Uso la función setTimeout para que el alerta desaparezca
        //Eliminamos la alerta
        setTimeout(function () {
            alerta.remove();
        }, 4000);
    }
}

//Función para mostrar el resumen de la cita agendada
function mostrarResumen() {
    const resumen = document.querySelector(".contenido-resumen"); //seleccionamos el DIV contenido-resumen

    //Limpiamos el contenido de resumen
    while (resumen.firstChild) {
        resumen.removeChild(resumen.firstChild);
    }

    //iteramos entre los campos del objeto con object.values para comprobar si tiene algún campo vacío y comprobamos si el usuario a seleccionado algún servicio porque cita.servicios.length comprueba el campo de servicios del objeto cita y será 0 si no hay ningún servicio
    if (Object.values(cita).includes("") || cita.servicios.length === 0) {
        mostrarAlerta(
            "Falta seleccionar el servicio, la fecha o la hora",
            "error",
            ".contenido-resumen",
            false
        );

        return;
    }

    //creamos las variables y sus valores del objeto cita
    const { nombre, fecha, hora, servicios } = cita;

    //Heading para servicios en Resumen
    const headingServicios = document.createElement("H3");
    headingServicios.textContent = "Resumen de los Servicios solicitados";

    //Añado el heading al resumen para mostrarlo en la página
    resumen.appendChild(headingServicios);

    //Iterando y mostrando los servicios (es un array)
    servicios.forEach((servicio) => {
        //Extraemos las variables y sus valores del cada objeto de servicio
        const { id, precio, nombre } = servicio;
        //Colocamos cada servicio en un DIV
        const contenedorServicio = document.createElement("DIV");
        //Añado una clase para darle estilos
        contenedorServicio.classList.add("contenedor-servicio");

        const textoServicio = document.createElement("P");
        textoServicio.textContent = nombre;

        const precioServicio = document.createElement("P");
        precioServicio.innerHTML = `<span>Precio:</span> ${precio} €`;

        //Añadimos al contenedor DIV los dos párrafos que hemos creado
        contenedorServicio.appendChild(textoServicio);
        contenedorServicio.appendChild(precioServicio);

        //Añadimos todo los datos de los servicios al DIV de resumen
        resumen.appendChild(contenedorServicio);
    });

    //Heading para los datos de la cita del cliente en Resumen
    const headingCita = document.createElement("H3");
    headingCita.textContent = "Resumen de la Cita";
    resumen.appendChild(headingCita);

    const nombreCliente = document.createElement("P");
    nombreCliente.innerHTML = `<span>Nombre:</span> ${nombre}`;

    //Formatear la fecha en español
    //Creo una instancia de date con el string de la fecha elegida por el usuario
    const fechaObj = new Date(fecha);
    const mes = fechaObj.getMonth();
    const dia = fechaObj.getDate() + 2; //Porque uso date 2 veces tendría un desfase de 2 días
    const year = fechaObj.getFullYear();
    //Creo una nueva instancia de la fecha pero en UTC formato UNIX
    const fechaUTC = new Date(Date.UTC(year, mes, dia));

    //Añadimos algunas opciones para mostrar la fecha
    const opciones = {
        weekday: "long",
        year: "numeric",
        month: "long",
        day: "numeric",
    };

    //Formateamos la fecha a formato local (necesita que sea un objeto para usar tolocaldatestring)
    const fechaFormateada = fechaUTC.toLocaleDateString("es-ES", opciones);

    const fechaCita = document.createElement("P");
    fechaCita.innerHTML = `<span>Fecha:</span> ${fechaFormateada}`;

    const horaCita = document.createElement("P");
    horaCita.innerHTML = `<span>Hora:</span> ${hora} horas`;

    //Boton para Reservar una cita
    const botonReservar = document.createElement("BUTTON"); //Creo un elemento boton
    botonReservar.classList.add("boton-2"); // Le añado la clase de boton
    botonReservar.textContent = "Reservar Cita"; //le añado el texto
    botonReservar.onclick = reservarCita; //Ejecuto la función al pulsar clic, no pongo paréntesis porque eso llama inmediatamente a la función

    //Añado los datos del cliente al DIV de resumen
    resumen.appendChild(nombreCliente);
    resumen.appendChild(fechaCita);
    resumen.appendChild(horaCita);

    resumen.appendChild(botonReservar);
}
//Usamos una función asíncrona para usar await porque se tiene que conectar a la API y no sabemos cuanto tardará
async function reservarCita() {
    //Extraemos los datos del objeto cita
    const { nombre, fecha, hora, servicios, id } = cita;

    //Envio los datos al servidor para reservar la cita, solo necesito el id del servicio
    //Usamos map en lugar de foreach porque map colocará las coincidencias dentro de la variable idServicios
    const idServicios = servicios.map(servicio => servicio.id);


    const datos = new FormData(); //Añadimos datos al objeto formdata
    //Los campos de la izquierda son los nombres de los campos que están en POST y la derecha son las variables
    // datos.append("nombre", nombre); //Añadimos el nombre al formd
    datos.append("fecha", fecha); //Añadimos la fecha al formd
    datos.append("hora", hora); //Añadimos la hora al formd
    datos.append("usuarioId", id); //Añadimos el nombre al formd
    datos.append("servicios", idServicios); //Añadimos la hora al formd
    //poder ver los datos que estamos enviando en el formdata en el consolelog -> escibimos console.log([...datos]);

    // console.log([...datos]);
    // return;

    try {
        //Petición hacia la API
        const url = "http://localhost:3000/api/citas";


        // le pasamos dos parámetros, uno es la url y otro es un objeto de configuración que es obligatorio en post. Body es el cuerpo de la peticion que vamos a enviar que es datos. Así, identifica los datos y los envía justo con la petición POST hacia la url
        const respuesta = await fetch(url, {
            method: "POST",
            body: datos,
        });

        // console.log(respuesta);

        const resultado = await respuesta.json();
        console.log(resultado);


        //Mostramos información al usuario
        if (resultado.resultado) {

            mostrarAlerta("La cita se ha guardado correctamente", "exito", "#paso-3 p ");
            //hacemos que el mensaje desaparezca a los 3s y la página se recargue
            setTimeout(() => {
                window.location.reload();
            }, 3000);
        }
    } catch (error) {
        mostrarAlerta("Hubo un error al guardar la cita", "error", "#paso-3 p ");
        console.log(error);
    }
}