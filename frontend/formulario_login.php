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


    <article class="article-form-login">
        <div class="div-form-login">
            <h1 class="title-form">Iniciar Sesion</h1>
            <form action="../backend/login.php" method="post" class="form-login">
                <label>E-mail
                    <input name="email" type="email" required maxlength="30" />
                </label>
                <label>Contraseña
                    <input type="password" name="password" required maxlength="12" />
                </label>
                <input class="btn-login" id="btn-login" type="submit" value="Login"/>
                <a class="register" href="formulario_signup.php">Registrarse</a>	
            </form>
            
            <?php if (isset($_SESSION['error'])): ?>
                <p style="color: red;"> <?php echo $_SESSION['error']; ?> </p>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>
        </div>

    </article>
</body>
</html>