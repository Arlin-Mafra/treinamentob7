<?php
class Usuario{
    private $id;
    private $nome;
    private $email;


    public function setId($i){
        $this->id = trim($i);
    }

    public function getId(){
        return $this->id;
    }

    public function setNome($n){
        $this->nome = trim($n);
    }

    public function getNome(){
        return $this->nome;
    }

    public function setEmail($e){
        $this->email = trim($e);
    }

    public function getEmail(){
        return $this->email;
    }
}


 interface IUsuarioDAO{

    public function create(Usuario $u);
    public function findAll();
    public function findById($id);
    public function update(Usuario $u);
    public function delete($id);
} 

?>