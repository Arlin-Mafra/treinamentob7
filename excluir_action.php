<?php
require 'config.php';
require 'dao/UsuarioDAO.php';

$usuarioDAO = new UsuarioDAO($pdo);

$id = filter_input(INPUT_GET, 'id');

if($id){
    $usuarioDAO->delete($id);
}
header("location:index.php");
exit;