<?php


class Usuarios
{
    private $email, $senha, $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function verificaLogin($email, $senha)
    {
        $sql = "SELECT * FROM tb_usuarios WHERE email = :email and senha = MD5(:senha)";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", $senha);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            $id = $sql->id;
            $ip = $_SERVER['REMOTE_ADDR'];
            $_SESSION['log'] = $id;

            $this->atualizaIP($id,$ip);
            return true;
        }
    }

    private function atualizaIP($id,$ip)
    {
        $sql = "UPDATE tb_usuarios set ip = :ip WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":ip", $ip);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }


    public function verificaLoginIP($id, $ip)
    {
        $sql = "SELECT * FROM tb_usuarios WHERE id = :id and ip = :ip";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->bindValue(":ip", $ip);
        $sql->execute();
        if ($sql->rowCount() == 0) {
            header("Location: login.php");
            exit;
        }
    }


}