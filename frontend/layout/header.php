<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JMboard</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <header class="header">
        <div class="nav-bar">
            <a href="../frontend/index.php"><h1><img src="../frontend/imagenes/logo.png" alt="Logo"></h1></a>
            <nav>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="../frontend/quienes_somos.php">Quienes Somos</a></li>
                    <li><a href="../frontend/opiniones.php">Deja tu Opinion</a></li>
                </ul>
            </nav>
        </div>
        <div class="login">
            <?php if (isset($_SESSION['logeado']) && ($_SESSION['logeado'])==true): ?>
                <a href="../backend/logout.php">Cerrar Sesion</a>
                <i class="bi bi-person-circle"></i>
            <?php else: ?>
                <a href="../frontend/formulario_login.php">Iniciar Sesion</a>
                <i class="bi bi-person-circle"></i>
            <?php endif; ?>
        </div>
    </header>
</body>
</html>