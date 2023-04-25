// Definimos las variables que vamos a utilizar
const { src, dest, watch, parallel } = require('gulp');

// APLICACIONES PARA LA PARTE DE CSS
const sass = require('gulp-sass')(require('sass'));
const plumber = require('gulp-plumber');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const postcss = require('gulp-postcss');
const sourcemaps = require('gulp-sourcemaps');

// APLICACIONES PARA LA PARTE DE IMÁGENES
const notify = require("gulp-notify");
const cache = require('gulp-cache');
const imagemin = require('gulp-imagemin');
const webp = require('gulp-webp');
const avif = require('gulp-avif');

// APLICACIÓN PARA LA PARTE DE JAVASCRIPT
// const rename = require("gulp-rename");
// const concat = require("gulp-concat");
const terser = require('gulp-terser-js');

//RUTAS PRINCIPALES DE LOS ARCHIVOS DE SASS, JS E IMÁGENES
const paths = {
    scss: "src/scss/**/*.scss",
    js: "src/js/**/*.js",
    imagenes: "src/img/**/*",
};

// FUNCIONES
function css() {
    return (
        src(paths.scss) // Identificar el archivo .SCSS a compilar
            .pipe(sourcemaps.init())
            .pipe(plumber())
            .pipe(sass()) // Compila el archivo a CSS
            .pipe(postcss([autoprefixer(), cssnano()]))
            .pipe(sourcemaps.write("."))
            .pipe(dest("./public/build/css")) // Almacena en el disco duro
    );
}

function imagenes() {
    return src(paths.imagenes)
        .pipe(cache(imagemin({ optimizationLevel: 3 })))
        .pipe(dest("./public/build/img"))
        .pipe(notify({ message: "Imagen Completada" }));
}

function versionWebp() {
    return src(paths.imagenes)
        .pipe(webp({ quality: 50 }))
        .pipe(dest("./public/build/img"))
        .pipe(notify({ message: "Imagen Completada" }));
}

function versionAvif() {
    return src(paths.imagenes)
        .pipe(avif({ quality: 50 }))
        .pipe(dest("./public/build/img"))
        .pipe(notify({ message: "Imagen Completada" }));
}

// Creamos un único fichero de JS uniendo los dos que tenemos
// function javascript() {
//     return src(paths.js)
//         .pipe(sourcemaps.init())
//         .pipe(concat("bundle.js")) // Añadimos el nombre al fichero final
//         .pipe(terser())
//         .pipe(sourcemaps.write("."))
//         .pipe(rename({ suffix: ".min" })) //Renombramos el fichero añadiendo min
//         .pipe(dest("./public/build/js"));
// }

function javascript() {
    return src(paths.js)
        .pipe(terser())
        .pipe(sourcemaps.write("."))
        .pipe(dest("./public/build/js"));
}

function watchArchivos() {
    watch(paths.scss, css);
    watch(paths.js, javascript);
    watch(paths.imagenes, imagenes);
}

exports.default = parallel(
    css,
    javascript,
    imagenes,
    versionWebp,
    versionAvif,
    watchArchivos
);

// exports.default = parallel(
//     css,
//     javascript,
//     watchArchivos
// );