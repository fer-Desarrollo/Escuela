<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema Escolar</title>
    <style>
        body { font-family: Arial; margin: 0; }
        header { background: #2c3e50; padding: 15px; }
        header a {
            color: white;
            margin-right: 15px;
            text-decoration: none;
            font-weight: bold;
        }
        header a:hover {
            text-decoration: underline;
        }
        .content { padding: 20px; }
    </style>
</head>
<body>

<header>
    <a href="<?= site_url('registroalumnos') ?>">Registro Alumnos</a>
    <a href="<?= site_url('registrogrupos') ?>">Registro Grupos</a>
    <a href="<?= site_url('alumnosregistrados') ?>">Alumnos Registrados</a>
    <a href="<?= site_url('configuracioncatalogos') ?>">Configuración Catálogos</a>

</header>

<div class="content">
