<?php 

    function routesURL(){
        if(isset( $_GET["url"])){
            $url = $_GET["url"] ? $_GET["url"] : "home";
        }else{
            $url = "home";
        }
        switch($url){
            case 'home':
                
               include_once('./portal/home.php'); 
            break;
            case 'quiz':
                
                include_once('./portal/quizes.php'); 
             break;
             case 'creditos':
               
                include_once('./portal/credits.php'); 
             break;
             case 'login':
                include_once('./portal/login.php'); 
             break;
             case 'noticia':
                include_once('./portal/noticia.php'); 
             break;
             case 'logout':
                include_once('logout.php'); 
             break;
             case 'insert':
                include_once('./private/inserir.php'); 
             break;
             case 'editar_post':
               
                include_once('./private/editar_post.php'); 
             break;
             case 'excluir_post':
                include_once('./private/excluir_post.php'); 
             break;


            default: 
            include_once('./portal/404.php');
            break;
        }
    }
?>