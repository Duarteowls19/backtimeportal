<?php
require_once('connection.php');

class PublicFunctions extends Conexao{

    public function logar($email, $senha){
        $cadastrados = $this->conn->prepare("SELECT * FROM `cadastrados` WHERE email = ?");
        $cadastrados->execute([$email]);
        $user = $cadastrados->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($senha, $user['senha']) && $email === $user['email']) {
            session_start();
            $_SESSION['cadastrados'] = $user['id'];
            header("Location: insert");
            exit();
        } else {
            return 'Login inválido';
        }

    }

    public function inserirNoticia($titulo, $subtitulo, $subtitulo2, $path, $path2, $link, $escritor, $creditos, $data_pub){
        $sql = "INSERT INTO noticias (titulo, subtitulo, subtitulo2, path, path2, link, escritor, creditos, data_pub) VALUES (:titulo, :subtitulo, :subtitulo2, :path, :path2, :link, :escritor, :creditos, :data_pub)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':subtitulo', $subtitulo);
        $stmt->bindParam(':subtitulo2', $subtitulo2);
        $stmt->bindParam(':path', $path);
        $stmt->bindParam(':path2', $path2);
        $stmt->bindParam(':link', $link);
        $stmt->bindParam(':escritor', $escritor);
        $stmt->bindParam(':creditos', $creditos);
        $stmt->bindParam(':data_pub', $data_pub);
        $stmt->execute();
    }
    public function editarNoticia($id, $titulo, $subtitulo, $subtitulo2, $path, $path2, $link, $escritor, $creditos, $data_pub){
        $sql = "UPDATE noticias SET titulo=:titulo, subtitulo=:subtitulo, subtitulo2=:subtitulo2, path=:path, path2=:path2, link=:link, escritor=:escritor, creditos=:creditos, data_pub=:data_pub WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':subtitulo', $subtitulo);
        $stmt->bindParam(':subtitulo2', $subtitulo2);
        $stmt->bindParam(':path', $path);
        $stmt->bindParam(':path2', $path2);
        $stmt->bindParam(':link', $link);
        $stmt->bindParam(':escritor', $escritor);
        $stmt->bindParam(':creditos', $creditos);
        $stmt->bindParam(':data_pub', $data_pub);
        $stmt->execute();
    }
    public function excluirNoticia($id){
        $sql = "DELETE FROM noticias WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    

    public function mostrarNoticiasCompletas($id){
        // ORDER BY `data_pub` DESC
        $noticias = $this->conn->query("SELECT * FROM `noticias` WHERE id = $id");
        $noticia = $noticias->fetchAll();
        arsort($noticia);
        return $noticia;
    }
    public function mostrarNoticiasIncompletas(){
        $noticias = $this->conn->query("SELECT * FROM noticias");
        $noticia = $noticias->fetchAll();
        arsort($noticia);
        return $noticia;
    }
    public function inserir_quiz_request($nome,$mensagem,$resultado){
        $sql = "INSERT INTO quiz request (nome, mensagem, resultado)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':mensagem', $mensagem);
        $stmt->bindParam(':resuktado', $resultado);
        
        $stmt->execute();
        
        if($stmt->rowCount() >= 1){
            echo json_encode('salvo com sucesso');
        }else{
            echo json_encode('deu merda');
        }
    }
}
?>