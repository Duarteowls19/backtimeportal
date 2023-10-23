<?php

header('Content-Type: application/json');


    $pdo = new PDO('mysql:host=localhost;dbname=main_owls_db', 'root', '');
    $stmt = $pdo->prepare('SELECT * FROM cadastro');
    $stmt->execute();

    if($stmt->rowCount() >= 1){
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }else{
        echo json_encode('deu merda');
    }


?>