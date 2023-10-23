<?php
header('Content-Type: application/json');

if(isset($_POST['name']) && isset($_POST['comment'])){
    $name = $_POST['name'];
    $comment = $_POST['comment'];

    $pdo = new PDO('mysql:host=localhost;dbname=main_owls_db', 'root', '');
    $stmt = $pdo->prepare('INSERT INTO cadastro (name, comment) VALUES (:na, :co)');
    $stmt->bindValue(':na', $name);
    $stmt->bindValue(':co', $comment);
    $stmt->execute();

    if($stmt->rowCount() >= 1){
        echo json_encode('salvo com sucesso');
    }else{
        echo json_encode('deu merda');
    }
    
}else{
    echo json_encode('parâmetros ausentes');
}
?>