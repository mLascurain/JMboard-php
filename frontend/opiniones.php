<?php session_start(); ?>
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
    <article class="popup">
        <?php if (isset($_SESSION['opinionEnviada'])): ?>
            <p> <?php echo $_SESSION['opinionEnviada']; ?> </p>
            <?php unset($_SESSION['opinionEnviada']); ?>
        <?php endif; ?>
    </article>
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
            <img class="imagen" src="imagenes/opinion.png" alt="persona opinando">
        </div>
        
    </article>

    <article class="wave">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#8a2be2" fill-opacity="0.6" d="M0,0L48,21.3C96,43,192,85,288,133.3C384,181,480,235,576,224C672,213,768,139,864,106.7C960,75,1056,85,1152,101.3C1248,117,1344,139,1392,149.3L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    </article>
<?php
include("layout/footer.php");?>
<script>
    const popup = document.getElementByClassName("popup");
    


</script>
</body>
</html>