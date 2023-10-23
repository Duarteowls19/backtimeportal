<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/index_page.css">
    <link rel="stylesheet" href="./style/not.css">
    <link rel="icon" href="./images/other/developed by Duarte (2).png" type="image/png">
    <title>backtime news portal</title>
</head>
<body>
 <header class="main_header">
    <div class="logo">
          <img src="./images/other/developed_by_Duarte__4_-removebg-preview.png"/>
</div>


    <div class="links"> 
       <a  href="<?php echo htmlspecialchars('/teste_para_trab/home'); ?>"><p>home</p></a>
       <a href="<?php echo htmlspecialchars('/teste_para_trab/quiz'); ?>"><p>quiz</p></a>
       <a href="<?php echo htmlspecialchars('/teste_para_trab/creditos'); ?>"><p>creditos</p></a>
    </div>
        
</header>
<main>
    <?php 
        include_once('./essencials/routes.php');
        routesURL();
    ?>
</main>
</body>
</html>