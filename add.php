<?php
require('header.php');
?>


<div class="container">
    <h3 class="display-6">Adicionar Usuário</h3>
    <form method="POST" action="add_action.php"> 
        <label >Nome:</label>
        <br>
        <input type="text" name="name" placeholder="Nome">
        <br><br><br>
        <label>Email</label>
        <br>
        <input type="email" name="email" placeholder="E-Mail">
        <br><br><br>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>