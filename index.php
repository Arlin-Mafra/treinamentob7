<?php
require 'config.php';
require 'dao/UsuarioDAO.php';

$usuarioDAO = new UsuarioDAO($pdo);

$lista = $usuarioDAO->findAll();
?>


<a href="adicionar.php">Adicionar Usuário</a>
<table border="1" width="100%">

    <thead>
        <td>ID</td>
        <td>Nome</td>
        <td>Email</td>
        <td>Ações</td>
    </thead>

    <?php foreach ($lista as $usuarios) :  ?>
        <tbody>
            <tr>
                <td><?= $usuarios->getId(); ?></td>
                <td><?= $usuarios->getNome(); ?></td>
                <td><?= $usuarios->getEmail(); ?></td>
                <td>
                    <a href="editar_usuario.php?id=<?= $usuarios->getId(); ?>">Editar</a>
                    <a onclick="return confirm('Tem certeza que deseja deletar?');" href="excluir_action.php?id=<?= $usuarios->getId(); ?>">Excluir</a>
                </td>
            </tr>
        </tbody>
    <?php endforeach ?>
</table>