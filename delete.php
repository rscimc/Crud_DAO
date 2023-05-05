<?php
require('config.php');
require('header.php');
require('./dao/UsuarioDaoMysql.php');

$usuarioDao = new UsuarioDaoMysql($pdo);

$id = filter_input(INPUT_GET, 'id');

if($id) {
    $usuarioDao->delete($id);

}

header("Location: index.php");
exit;


?>


<div class="container">
    <h3 class="display-6">Excluir Usuário</h3>
    <form method="POST" action="delete_action.php">
        <input type="hidden" name="id" value="<?=$usuario['id']?>">
        <label >Nome:</label>
        <br>
        <input type="text" name="name" placeholder="Nome" value="<?=$usuario['nome']?>">
        <br><br><br>
        <label>Email</label>
        <br>
        <input type="email" name="email" placeholder="E-Mail" value="<?=$usuario['email']?>">
        <br><br><br>
        <button type="submit" class="btn btn-danger" 
        onclick="return confirm('Tem certeza que deseja excluir o usuário?')">Excluir</button>
    </form>
</div>