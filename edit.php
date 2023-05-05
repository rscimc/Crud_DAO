<?php
require('config.php');
require('header.php');
require('./dao/UsuarioDaoMysql.php');

$usuarioDao = new UsuarioDaoMysql($pdo);

$usuario = false;
$id = filter_input(INPUT_GET, 'id');

if($id) {
    $usuario = $usuarioDao->findById($id);
}

if($usuario === false) {
    header("Location: index.php");
    exit;
}
?>


<div class="container">
    <h3 class="display-6">Editar Usuário</h3>
    <form method="POST" action="edit_action.php">
        <input type="hidden" name="id" value="<?=$usuario->getId();?>" />
        <label >Nome:</label>
        <br>
        <input type="text" name="name" placeholder="Nome" value="<?=$usuario->getNome();?>" />
        <br><br><br>
        <label>Email</label>
        <br>
        <input type="email" name="email" placeholder="E-Mail" value="<?=$usuario->getEmail();?>">
        <br><br><br>
        <button type="submit" class="btn btn-success">Editar</button>
    </form>
</div>