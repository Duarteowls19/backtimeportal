<?php 
require_once './essencials/funcs.php'; 
?>
<!DOCTYPE html>
<html>
<body>
<section style="margin-bottom: 50px;">
<?php
    $mostrarnoticias = new PublicFunctions();
    $noticias = $mostrarnoticias->mostrarNoticiasIncompletas();
?>
<?php foreach ($noticias as $noticia): ?>
    <div class="noticias_inc">
	    <h2><?php echo $noticia['titulo']; ?></h2>
        <img src="<?php echo $noticia['path']; ?>">
		<a href="noticia?id=<?php echo $noticia['id']; ?>"><p>acessar noticia</p></a>
	</div>


<?php endforeach; ?>
</section>
<section>
<div class="final_images">
    <img src="./images/other/developed_by_Duarte__2_-removebg-preview.png">
<a href="home"><img src="./images/other/developed_by_Duarte__1_-removebg-preview.png"></a>
</div>
</section>

</body>
</html>