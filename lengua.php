<?php

$idioma = 'es';

if ($_GET && isset($_GET['idioma'])) {
    $idioma = in_array($_GET['idioma'], ['es', 'en']) ? $_GET['idioma'] : 'es';
}

$cadenas = [
    'menu.inicio' => [
        'es' => 'Inicio',
        'en' => 'Home'
    ],
    'menu.subir' => [
        'es' => 'Subir',
        'en' => 'Upload'
    ],
    'menu.ficheros' => [
        'es' => 'Ficheros',
        'en' => 'Files'
    ],
    'idioma.español' => [
        'es' => 'Español',
        'en' => 'Spanish'
    ],
    'idioma.ingles' => [
        'es' => 'Inglés',
        'en' => 'English'
    ],
    'idioma.boton' => [
        'es' => 'Aceptar',
        'en' => 'Ok'
    ],
    'inicio.subida' => [
        'es' => 'Empieza a subir fiecheros',
        'en' => 'Go to upload files'
    ],
    'inicio.subida.tooltip' => [
        'es' => 'Subir archivos',
        'en' => 'Upload files'
    ],
    'bienvenida' => [
        'es' => 'Bienvenid@ a MiniMyCloud',
        'en' => 'Welcome to MiniMyCloud'
    ],
    'subida.titulo' => [
        'es' => 'Sube ficheros PDF o imágenes GIF, PNG y JPEG',
        'en' => 'Upload PDF files or GIF, PNG and JPEG images',
    ],
    'subida.nombreFichero' => [
        'es' => 'Nombre del fichero',
        'en' => 'File name',
    ],
    'subida.fichero' => [
        'es' => 'Selecciona el fichero',
        'en' => 'Select a file',
    ],
    'subida.botonS' => [
        'es' => 'Subir fichero',
        'en' => 'Upload file',
    ],
    'subida.botonV' => [
        'es' => 'Ver ficheros',
        'en' => 'See files',
    ],
    'ficheros.titulo1' => [
        'es' => 'Tus ficheros',
        'en' => 'Your files',
    ],
    'ficheros.titulo2' => [
        'es' => 'Tus imagenes',
        'en' => 'Your images',
    ],
    'ficheros.nombre' => [
        'es' => 'Nombre',
        'en' => 'Name',
    ],
    'ficheros.ruta' => [
        'es' => 'Ruta',
        'en' => 'Path',
    ],
    'ficheros.descargar' => [
        'es' => 'Descargar',
        'en' => 'Download',
    ],
    'ficheros.eliminar' => [
        'es' => 'Eliminar',
        'en' => 'Delete',
    ],
    'ficheros.ver' => [
        'es' => 'Ver',
        'en' => 'View',
    ],
    'subparrafo' => [
        'es' => 'Desde aquí puedes administrar tus ficheros',
        'en' => 'From here you can manage your files',
    ],
    'saludo' => [
        'es' => 'Hola',
        'en' => 'Hello'
    ],
    'despedida' => [
        'es' => 'Adiós',
        'en' => 'Bye'
    ],
    'imagen.fecha' => [
        'es' => 'Fecha de subida',
        'en' => 'Upload date'
    ],
    'imagen.tamaño' => [
        'es' => 'Tamaño',
        'en' => 'Size'
    ]
];

function getCadena(string $id): string
{
    global $idioma, $cadenas;

    if (isset($cadenas[$id])) {
        return $cadenas[$id][$idioma];
    } else {
        return "Error interno: la cadena identificada con $id no existe";
    }
}