<?php
//!Controlador Frontal
//?Encargado de recoger los parametros GET por URL, revisar a que controlador pertenece y cargar ese archivo, objeto y llamar al metodo correspondiente que llega por la URL
session_start();

require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';


function showError()
{
    $error = new errorController();
    $error->index();
}

if (isset($_GET['controller'])) {
    $nombreControlador =  $_GET['controller'] . 'Controller';
} elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
    $nombreControlador = controllerDefault;
} else {
    showError();
    exit();
}

if (class_exists($nombreControlador)) {
    $controlador = new $nombreControlador();

    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action();
    } elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
        $default = actionDefault;
        $controlador->$default();
    } else {
        showError();
    }
} else {
    showError();
}

require_once 'views/layout/footer.php';
