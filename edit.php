<?php
require('config.php');
require('header.php');

$usuario = [];
$id = filter_input(INPUT_GET, 'id');

if($id) {
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if($sql->rowCount() > 0) {
        $usuario = $sql->fetch(PDO::FETCH_ASSOC);
    }else {
        header("Location: index.php");
        exit;
    }

} else {
    header("Location: index.php");
    exit;
}

?>


<div class="container">
    <h3 class="display-6">Editar Usuário</h3>
    <form method="POST" action="edit_action.php">
        <input type="hidden" name="id" value="<?=$usuario['id']?>">
        <label >Nome:</label>
        <br>
        <input type="text" name="name" placeholder="Nome" value="<?=$usuario['nome']?>">
        <br><br><br>
        <label>Email</label>
        <br>
        <input type="email" name="email" placeholder="E-Mail" value="<?=$usuario['email']?>">
        <br><br><br>
        <button type="submit" class="btn btn-success">Editar</button>
    </form>
</div>