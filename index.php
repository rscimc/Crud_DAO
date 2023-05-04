<?php
require('./config.php');
require('./header.php');
require('./dao/UsuarioDaoMysql.php');

$usuarioDao = new UsuarioDaoMysql($pdo);
$lista = $usuarioDao->findAll();

?>

<table class="table table-dark table-striped container">
<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>

  <?php foreach ($lista as $usuario): ?>
    <tr>
      <th scope="row"><?=$usuario->getId();?></th>
      <td><?=$usuario->getNome();?></td>
      <td><?=$usuario->getEmail();?></td>
      <td>
        <a href="edit.php?id=<?=$usuario->getId();?>">
          <button type="button" class="btn btn-secondary">Editar</button>
        </a>
        <a href="delete.php?id=<?=$usuario->getId();?>">
          <button type="button" class="btn btn-info">Excluir</button>
        </a>
      </td>
    </tr>
  <?php endforeach; ?>

  </tbody>
  </table>



    </body>
</html>

