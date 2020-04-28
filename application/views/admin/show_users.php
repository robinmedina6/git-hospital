<?php if($msg=$this->session->flashdata('msg')): ?>
    <div class="alert alert-success" role="alert">
      <?=$msg?>
    </div>
<?php endif;?>
<h1 class="text-center">Tabla de Usuarios Registrados</h1>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">id</th>
      <th scope="col">usuario</th>
      <th scope="col">correo</th>
      <th scope="col">status</th>
      <th scope="col">rango</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($data as $item): ?> 
    <tr>
      <th scope="row"><?=$item->id ?></th>
      <td><?=$item->nombre_usuario ?></td>
      <td><?=$item->correo ?></td>
      <td><?=$item->status == 1 ?  'activo' : 'inactivo' ?></td>
      <td><?=$item->range ?></td>
      <td><a href="<?=base_url('index.php/users/edit/'.$item->id)?>" type="button" class="btn btn-warning">Editar</a> / <a href="<?=base_url('index.php/users/delete/'.$item->id)?>" type="button" class="btn btn-danger">Eliminar</a></td>
    </tr>
    <?php endforeach; ?>
    
  </tbody>
</table>
<?= $this->pagination->create_links();?>