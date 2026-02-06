<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';

/*
|--------------------------------------------------------------------------
| Rutas VISTAS
|--------------------------------------------------------------------------
*/
$route['registroalumnos']        = 'welcome/registroalumnos';
$route['registrogrupos']         = 'welcome/registrogrupos';
$route['alumnosregistrados']     = 'welcome/alumnosregistrados';
$route['configuracioncatalogos'] = 'welcome/configuracioncatalogos';

/*
|--------------------------------------------------------------------------
| Rutas API - ESCUELA
|--------------------------------------------------------------------------
*/
$route['api/carreras'] = 'Escuela/obtener_carreras';
$route['api/turnos']   = 'Escuela/obtener_turnos';
$route['api/grados']   = 'Escuela/obtener_grados';
$route['api/grupos']   = 'Escuela/obtener_grupos';

$route['api/carrera']  = 'Escuela/registrar_carrera';
$route['api/grupo']    = 'Escuela/registrar_grupo';
$route['api/alumno']   = 'Escuela/registrar_alumno';

$route['api/alumnos']  = 'Escuela/listar_alumnos';

/*
|--------------------------------------------------------------------------
| Cambiar estado (PUT)
|--------------------------------------------------------------------------
*/
$route['api/alumno/(:num)']  = 'Escuela/cambiar_estado_alumno/$1';
$route['api/carrera/(:num)'] = 'Escuela/cambiar_estado_carrera/$1';
$route['api/grupo/(:num)']   = 'Escuela/cambiar_estado_grupo/$1';
$route['api/turno/(:num)']   = 'Escuela/cambiar_estado_turno/$1';
$route['api/grado/(:num)']   = 'Escuela/cambiar_estado_grado/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
