<?php slot('titulo', 'Usuarios'); ?>

<div class="x12">
<div style="float:right;">
<a href="<?php echo url_for('users/new') ?>"><button class="btn btn-small">Nuevo</button></a>
</div>
<div style="clear:both;"></div>
<br/>

<table class="data display">
  <thead>
    <tr>
      <th>Username</th>
      <th>Nombre Completo</th>
      <th>Email</th>
      <th>&Uacute;ltimo Login</th>
      <th>Opciones</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 0; ?>
    <?php foreach ($sf_guard_users as $sf_guard_user): ?>
    <tr <?php if($i%2==0)echo "class='odd gradeX'"; else echo "class='even gradeC'";?>>
      <td><?php echo $sf_guard_user->getUsername() ?></td>
      <td><?php echo $sf_guard_user->getFirstName()." ".$sf_guard_user->getLastName() ?></td>
      <td><?php echo $sf_guard_user->getEmailAddress() ?></td>
      <td><?php echo $sf_guard_user->getLastLogin() ?></td>
      <td class="center">
        <?php echo link_to('<span></span>Editar', 'users/edit?id='.$sf_guard_user->getId(), array('class'=>'btn-mini btn-black btn-comment')) ?>
        <?php echo link_to('<span></span>Eliminar', 'users/delete?id='.$sf_guard_user->getId(), array('method' => 'delete', 'confirm' => '¿Estas seguro?','class'=>'btn-mini btn-black btn-cross')) ?>
      </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
  </tbody>
</table>

</div>