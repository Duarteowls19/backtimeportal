<?php 
require_once './essencials/funcs.php'; 


$id = intval($_GET['id']);

if(isset($_POST['sub'])){
    $publicfunc = new publicFunctions();
    $publicfunc->excluirNoticia($id);
    echo '<script>alert("sucesso ao excluir !");</script>';

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/insert.css">
    <link rel="stylesheet" href="./style/show_image_intead.css">
    <title>Inserir no DB</title>
</head>
<body>
        <a href="insert" class="logout"><p class="log_out">voltar</p></a>
    <section>
    <div class="exclute">
    <h2>tem certeza ?</h2>
    <form action="" method="POST">
        <button name="sub">sim</button>
        <a href="insert"><p>não</p></a>
    </form>
    </div></section>
</body>
</html>