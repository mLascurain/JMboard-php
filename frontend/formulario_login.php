<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
</head>
<body>
    <?php 
    include("layout/header.php");
    ?>
    <article class="article-form-login">
        <form action="./backend/login.php" method="post" class="form-login">
        <h1>Iniciar Sesion</h1>
        <label>Nombre de usuario
        	<input name="usuario" type="text" maxlength="12" />
        </label>
        <label>Contraseña
        	<input type="password" name="password" maxlength="12" />
        </label>
        	<input class="btn-login" type="submit" value="Login"/>	
        </form>

    </article>

    <?php include("layout/footer.php"); ?>
</body>
</html>