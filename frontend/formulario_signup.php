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
    <title>Registro</title>
    <link rel="icon" href="../frontend/imagenes/ico.png">
</head>
<body>
    <article class="article-form-signup">
        <a href="index.php"><img src="imagenes/logoBlack.png" alt="Logo"></a>
        <form action="../backend/signup.php" method="post" class="form-login">
            <h2>Registrate</h2>
            <h4>Ingresa tus credenciales para registrarte</h4>
            <label>
                Nombre de usuario
            </label>
            <input name="usuario" required type="text" maxlength="30" />
            <label>Mail
                <?php if (isset($_SESSION['error'])): ?>
                    <p class="error"><?php echo $_SESSION['error']; ?></p>
                    <?php unset($_SESSION['error']); ?>
                <?php endif; ?>
            </label>
            <input name="email" required type="email" maxlength="30" />
            <label>
                Contraseña
            </label>
            <input type="password" required name="password" minlength="6" maxlength="12" />
            <input id="btn-signup" type="submit" value="Registrarse"/>
            <p>¿Ya tienes cuenta?<a class="register" href="formulario_login.php">Iniciar Sesion</a>	</p>
        </form>
        <div class="wave">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#8a2be2" fill-opacity="0.6" d="M0,0L48,21.3C96,43,192,85,288,133.3C384,181,480,235,576,224C672,213,768,139,864,106.7C960,75,1056,85,1152,101.3C1248,117,1344,139,1392,149.3L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
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