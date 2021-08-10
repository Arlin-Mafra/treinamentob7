<?php
require 'config.php';
require 'dao/UsuarioDAO.php';

$usuarioDAO = new UsuarioDAO($pdo);


$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if ($id && $name && $email) {

    $usuario = $usuarioDAO->findById($id);

    $usuario->setNome($name);
    $usuario->setEmail($email);
    $usuarioDAO->update($usuario);

    header("location: index.php");
    exit;
} else {
    header("location: editar_usuario.php?id=".$id);
    exit;
}
