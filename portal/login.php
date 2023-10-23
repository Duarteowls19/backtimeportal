
<?php
if(isset($_POST['email'])){
    try {
    require_once './essencials/funcs.php'; 

        $email = $_POST['email'];
        $senha = $_POST['password'];
        $publicfuncs = new publicFunctions();
        $publicfuncs->Logar($email,$senha);
        
    } catch(PDOException $e) {
        echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/login.css">
    <title>Login</title>
</head>
<body>
    <section>
    <form action="" method="POST">
        <h2>Login</h2>
        <input type="email" id="email" name="email" placeholder="email" required>
        <br><br>
        <input type="password" id="password" name="password" placeholder="senha" required>
        <br><br>
        <input type="submit" name="sub" value="Log In">
    </form>
    </section>
</body>
</html>

