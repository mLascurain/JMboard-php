<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/formularios.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
</head>
<body>
    <?php include("layout/header.php"); ?>
    <article class="article-form-login">
        <div>
            <h2 class="title-form">Iniciar Sesion</h2>
            <div>
                <a href="../frontend/index.php">
                    <button class="btn-inicio">Inicio</button>
                </a>
            </div>
            <form action="../backend/login.php" method="post" class="form-login">
                <label>E-mail
                    <input name="email" type="email" maxlength="30" />
                </label>
                <label>Contraseña
                    <input type="password" name="password" maxlength="12" />
                </label>
                <input class="btn-login" type="submit" value="Login"/>
                <a class="register" href="formulario_signup.php">Registrarse</a>	
            </form>
            
            <?php if (isset($_SESSION['error'])): ?>
                <p style="color: red;"> <?php echo $_SESSION['error']; ?> </p>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>
        </div>

    </article>
    <?php include("layout/footer.php"); ?>
</body>
</html>