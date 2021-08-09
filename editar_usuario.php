<?php
require 'config.php';

$info = [];
$id = filter_input(INPUT_GET, 'id');

if ($id) {

    $sql = $pdo->prepare('SELECT * FROM usuarios WHERE  id = :id');
    $sql->bindValue(":id", $id);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $info = $sql->fetch(PDO::FETCH_ASSOC);
    } else {

        header("location: editar_usuario.php");
        exit;
    }
} else {
    header("location: index.php");
    exit;
}

?>


<h1>Editar Usuário</h1>

<span><a href="index.php">Voltar</a></span><br /><br />
<form action="atualizar_action.php" method="POST">
    <input type="hidden" name="id" value="<?= $info['id']; ?>">
    <label for="nome">Nome</label>
    <input type="text" name="name" value="<?= $info['nome']; ?>">
    <label for="email">Email</label>
    <input type="text" name="email" value="<?= $info['email']; ?>">

    <button type="submit">Salvar</button>
</form>