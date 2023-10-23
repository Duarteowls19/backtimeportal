<?php 
    require_once './essencials/funcs.php'; 
    $id = intval($_GET['id']);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/notices.css">
</head>
<body>
<section>
<?php
    $mostrarnoticias = new PublicFunctions();
    $noticias = $mostrarnoticias->mostrarNoticiasCompletas($id);
?>
<?php foreach ($noticias as $noticia): ?>
    <div class="noticias">
        <h1><?php echo $noticia['titulo'] ?></h1>
        <img src="<?php echo $noticia['path'] ?>">
        <p><?php echo $noticia['subtitulo'] ?></p>
        <a href="<?php echo $noticia['link'] ?>">link da fonte</a>
        <img src="<?php echo $noticia['path2'] ?>">
        <p><?php echo $noticia['subtitulo2'] ?></p>
        <p class="fin"> <?php echo $noticia['escritor'] ?></p>
        <p class="fin"> <?php echo $noticia['creditos'] ?></p>
        <p class="fin"> <?php echo substr($noticia['data_pub'], 0, 10);  ?></p>
    </div>
<?php endforeach; ?>

<div class="final_images">
    <img src="./images/other/developed_by_Duarte__2_-removebg-preview.png">
<a href="home"><img src="./images/other/developed_by_Duarte__1_-removebg-preview.png"></a>
</div>
</section>
</body>
</html>