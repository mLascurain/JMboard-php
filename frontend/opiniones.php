<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/opiniones.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include("layout/header.php");?>
    <article class="opiniones">
        <div class="texto-opinion">
            <div class="form-opinion">
            <h2>Dejanos tu opinion  <i class="bi bi-chat-dots"></i></i></h2>
                <form action="../backend/envio-opinion.php" method="post">
                    <input name="name" type="text" required maxlength="30" placeholder="Nombre">
                    <input name="email" type="email" required maxlength="30" placeholder="Email">
                    <textarea name="opinion"  cols="30" rows="10" required maxlength="300" placeholder="Escribe tu opinion"></textarea>
                    <input id="btn-enviar" type="submit" value="Enviar">
                </form>
            </div>
        </div>
        <div class="imagen-opinion">
            <img class="imagen" src="imagenes/imagen-opinion.jpg" alt="persona opinando">
        </div>
            
    </article>

<?php
include("layout/footer.php");?>
</body>
</html>