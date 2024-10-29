<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProyectoFinal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="styles/index.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-custom fixed-top">
    <button class="btn btn-dark" id="toggleBtn">
        <i class="fas fa-bars"></i>
    </button>
    <a class="navbar-brand text-white ml-3" href="#">Mi Aplicación</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Perfil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Ajustes</a>
            </li>
        </ul>
    </div>
</nav>

<div class="sidebar" id="sidebar">
    <div class="p-3">
        <h4 class="text-center">Menú</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-home"></i> Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-th"></i> Widgets</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-globe"></i> Landing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-users"></i> Usuarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-exclamation-triangle"></i> Alertas</a>
            </li>
        </ul>
    </div>
</div>

<div class="content" id="content">
    <div class="container mt-5 pt-4">
        <h1>Contenido Principal</h1>
        <p>Este es el contenido principal de la página.</p>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    document.getElementById('toggleBtn').addEventListener('click', function () {
        var sidebar = document.getElementById('sidebar');
        var content = document.getElementById('content');
        var navbar = document.querySelector('.navbar-custom');
        
        sidebar.classList.toggle('active');
        content.classList.toggle('active');
        navbar.classList.toggle('active');
    });
</script>
</body>
</html>