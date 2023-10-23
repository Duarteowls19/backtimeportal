<?php

if(!isset($_SESSION))
    session_start();

if(!isset($_SESSION['cadastrados']))
    die('fudeu , nao esat logado');

require_once './essencials/funcs.php'; 

if(isset($_POST['sub'])){
    $titulo = $_POST['titulo'];
    $subtitulo = $_POST['subtitulo'];
    $subtitulo2 = $_POST['subtitulo2'];
    $path = $_FILES['path'];
    $path2 = $_FILES['path2'];
    $link = $_POST['link'];
    $escritor = $_POST['escritor'];
    $creditos = $_POST['creditos'];
    date_default_timezone_set('America/Sao_Paulo');
    $data_before = date('Y-m-d H:i');
    $data_pub = substr($data_before, 0, 10);

    if($path['error'] || $path2['error']){
        die("fala ao enviar error nos arquivos.");
    }
    if($path['size'] > 2097152 || $path2['size'] > 2097152){
        die("arquivo muito grande");
    }
    $pasta = "images/before/";
    $pasta2 = "images/after/";

    $nomeDoArquivo = $path['name'];
    $nomeDoArquivo2 = $path2['name'];

    $novoNomeDoArquivo = uniqid();
    $novoNomeDoArquivo2 = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo ,PATHINFO_EXTENSION));
    $extensao2 = strtolower(pathinfo($nomeDoArquivo2 ,PATHINFO_EXTENSION));

    if($extensao != 'jpg' && $extensao != 'png' || $extensao2 != 'jpg' && $extensao2 != 'png' ){
        die('tipo de arquivo nao aceito');
    }

   $deu_certo = move_uploaded_file($path["tmp_name"], $pasta . $novoNomeDoArquivo . "." . $extensao );
   $deu_certo2 = move_uploaded_file($path2["tmp_name"], $pasta2 . $novoNomeDoArquivo2 . "." . $extensao2 );

   if($deu_certo && $deu_certo2){
        $publicfunc = new publicFunctions();
        $publicfunc->inserirNoticia($titulo, $subtitulo, $subtitulo2, $pasta . $novoNomeDoArquivo . "." . $extensao, $pasta2 . $novoNomeDoArquivo2 . "." . $extensao2, $link, $escritor, $creditos, $data_pub);
   
        echo '<script>alert("noticia iserida com sucesso !");</script>';
    }else{
        echo '<ecript>alert("ocorreu um erro !")</ecript>';
    }
    

    
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charst="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/insert.css">
    <link rel="stylesheet" href="./style/show_image_intead.css">
    <title>Inserir no DB</title>
</head>
<body>
<a href="logout" class="logout"><p class="log_out">logout</p></a>
<section class="one">
    <h2>ensira as informaçoes para uma nova noticia</h2>
    <form method='POST' action="" enctype="multipart/form-data">
        <input type="text" name="titulo" placeholder="titulo" required>
        <textarea name="subtitulo" placeholder="subtitulo" required></textarea>
        <textarea name="subtitulo2" placeholder="subtitulo2" required></textarea>
        <input type="file" name="path" placeholder="image" class="path_image"  required>

        <label class="picture" for="path_image" tabIndex="0">
        <span class="picture__image"></span>
        </label>

        <input type="file" name="path2" placeholder="image2" class="path_image2" required>

        <label class="picture" for="path_image2" tabIndex="0">
        <span class="picture__image2"></span>
        </label>


        <input type="text" name="link" placeholder="link para video"  required>
        <input type="text" name="escritor" placeholder="publicador"  required>
        <input type="text" name="creditos" placeholder="creditos" required>
        <input type="submit" name="sub">
    </form>
</section>
<section>
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
    <div class="acoes"><a href="editar_post?id=<?php echo $noticia['id']; ?>"><p>editar</p></a><a href="excluir_post?id=<?php echo $noticia['id'] ?>"><p>excluir</p></a></div>

<?php endforeach; ?>
</section>
<script src="./scripts/image_show.js"></script>
</body>
</html>