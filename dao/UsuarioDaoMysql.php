<?php
require_once('models/Usuario.php');

class UsuarioDaoMysql implements UsuarioDAO {
    private $pdo;

    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }

    public function add(Usuario $u){
        $sql = $this->pdo->prepare("INSERT INTO usuarios (nome, email) VALUES (:name, :email)");
        $sql->bindValue(':name', $u->getNome());
        $sql->bindValue(':email', $u->getEmail());
        $sql->execute();

        $u->setId($this->pdo->lastInsertId());
        return $u;
    }
    public function findAll(){
        $array = [];
        $sql = $this->pdo->query("SELECT * FROM usuarios");
        if($sql->rowCount() > 0) {
            $data = $sql->fetchAll();

            foreach($data as $item) {
                $u = new Usuario();
                $u->setId($item['id']);
                $u->setNome($item['nome']);
                $u->setEmail($item['email']);
                
                $array[] = $u;
            }
        }
        return $array;
    }
    public function findById($id){

    }
    public function findByEmail($email){
        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $data = $sql->fetch();

            $u = new Usuario();
            $u->setId($item['id']);
            $u->setNome($item['nome']);
            $u->setEmail($item['email']);
            
            return $u;

        } else {
            return false;
        }
    }
    public function update(Usuario $u){

    }
    public function delete($id){

    }
}