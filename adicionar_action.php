<?php
require 'config.php';
require 'dao/UsuarioDAO.php';

$usuarioDAO = new UsuarioDAO($pdo);

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if($name && $email){

    if($usuarioDAO->findByEmail($email) === false){
        $novoUsuario = new Usuario();
        $novoUsuario->setNome($name);
        $novoUsuario->setEmail($email);

        $usuarioDAO->create($novoUsuario);

        header("location: index.php");
        exit;
    }else{
        header("location: adicionar.php");
        exit;
        }
    }else{
        header("location: adicionar.php");
        exit;

    }

