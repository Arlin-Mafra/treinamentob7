<?php
require 'config.php';
require 'dao/UsuarioDAO.php';

$usuarioDAO = new UsuarioDAO($pdo);

$usuario = false;

$id = filter_input(INPUT_GET, 'id');

if($id){
    $usuario = $usuarioDAO->findById($id);
}

if($usuario === false){
    header("location: index.php");
    exit;
}

?>


<h1>Editar Usuário</h1>

<span><a href="index.php">Voltar</a></span><br /><br />
<form action="atualizar_action.php" method="POST">
    <input type="hidden" name="id" value="<?= $usuario->getId(); ?>" />
    <label for="nome">Nome</label>
    <input type="text" name="name" value="<?= $usuario->getNome();?>" require/>
    <label for="email">Email</label>
    <input type="text" name="email" value="<?= $usuario->getEmail(); ?>" require/>

    <button type="submit">Salvar</button>
</form>