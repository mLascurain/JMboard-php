<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/formularios.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
    <link rel="icon" href="../frontend/imagenes/ico.png">
</head>
<body>
    <article class="article-form-login">
        <div class="div-form-login">
            <a href="index.php"><img src="imagenes/logoBlack.png" alt="Logo"></a>
            <?php if (isset($_SESSION['error_not_login'])): ?>
                <p class="error"> <?php echo $_SESSION['error_not_login']; ?> </p>
                <?php unset($_SESSION['error_not_login']); ?>
            <?php endif; ?>
            <form action="../backend/login.php" method="post" class="form-login">
                <h2>Iniciar Sesion</h2>
                <h4>Ingresa tus credenciales para acceder</h4>
                <label>E-mail 
                    <?php if (isset($_SESSION['errorEmail'])): ?>
                        <p class="error"> <?php echo $_SESSION['errorEmail']; ?> </p>
                        <?php unset($_SESSION['errorEmail']); ?>
                    <?php endif; ?>
                </label>
                <input name="email" type="email" required maxlength="30" />
                <label>Contraseña 
                    <?php if (isset($_SESSION['errorPassword'])): ?>
                    <p class="error"> <?php echo $_SESSION['errorPassword']; ?> </p>
                    <?php unset($_SESSION['errorPassword']); ?>
                    <?php endif; ?>
                </label>
                <input type="password" name="password" required maxlength="12" />
                <input class="btn-login" id="btn-login" type="submit" value="Login"/>
                <p>¿No tienes cuenta? <a class="register" href="formulario_signup.php">Registrarse</a></p>	
            </form>
        </div>
        <div class="wave">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#8a2be2" fill-opacity="0.6" d="M0,0L48,21.3C96,43,192,85,288,133.3C384,181,480,235,576,224C672,213,768,139,864,106.7C960,75,1056,85,1152,101.3C1248,117,1344,139,1392,149.3L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
        </div>  
    </article>
    <?php include("layout/footer.php");?>

    <script>

        const error = document.querySelector(".error");
        if (error) {
            error.classList.add("-show");
        }
    </script>
</body>
</html>