<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/quienes_somos.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
include("layout/header.php");?>

<article class="quienes-somos">
    <div class="texto">
        <img class="logo" src="imagenes/logo.png" alt="JMboard Logo">
        <h1>Quienes Somos</h1>
        <p class="parrafo">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa neque eaque magni quod voluptates quidem quia beatae delectus amet esse nemo iste aspernatur culpa fuga unde iusto ut porro, dicta rerum provident dignissimos? Nulla placeat tenetur laboriosam fugit veritatis animi ipsa ullam vel accusantium ab reiciendis aliquam, quas odio id.</p>
        <h2>Ambitos de JMboard</h2>
        <ul class="lista-usos">
            <li><i class="bi bi-house"></i> Casa</li>
            <li><i class="bi bi-basket2"></i> Compras</li>
            <li><i class="bi bi-backpack2"></i> Estudio</li>
            <li><i class="bi bi-duffle"></i> Trabajo</li>
        </ul>
    </div>
    <div class="imagen">
        <img class="to-do-img" src="imagenes/to-do.png" alt="Lista To-Do">
    </div>
</article>
<article class="opiniones">
    <div class="texto-opinion">
        <h2>Dejanos tu opinion  <i class="bi bi-chat-dots"></i></i></h2>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quisquam soluta harum in, facere sed voluptates repellat culpa eos itaque odio ex quaerat, sint quo ipsa! Repellendus natus voluptate quaerat consequatur minus sunt autem odit assumenda! Optio error, saepe itaque hic perferendis numquam ut adipisci consequatur iure facere fugiat cumque at!</p>
    </div>
    <div class="form-opinion">
        <form action="">
            <span>
                <input type="text" required maxlength="30" placeholder="Nombre">
                <input type="text" required maxlength="30" placeholder="Email">
            </span>
            <textarea name="" id="" cols="30" rows="10" required maxlength="300" placeholder="Escribe tu opinion"></textarea>
            <input class="btn-enviar" type="submit" value="Enviar">
    </div>
</article>
<?php
include("layout/footer.php");?>
</body>
</html>