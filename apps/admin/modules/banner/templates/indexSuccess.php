<?php slot('titulo', 'Banners'); ?>

<div class="x12">
<div style="float:right;">
<a href="<?php echo url_for('banner/nuevo') ?>"><button class="btn btn-small">Nuevo</button></a>
</div>
<div style="clear:both;"></div>
<br/>

<table class="data display">
  <thead>
    <tr>
      <th width="300">Título</th>
      <th>Miniatura</th>
      <th>Opciones</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 0; ?>
    <?php foreach ($banners as $banner): ?>
    <tr <?php if($i%2==0)echo "class='odd gradeX'"; else echo "class='even gradeC'";?>>
      <td><?php echo $banner->getTitulo() ?></td>
      <td><img src="<?php echo $banner->getImageSrc('slide', 'mini') ?>" alt="Slide" /></td>
      <td class="center">
        <?php echo link_to('<span></span>Editar', 'banner/editar?id='.$banner->getId(), array('class'=>'btn-mini btn-black btn-comment')) ?>
        <?php echo link_to('<span></span>Eliminar', 'banner/delete?id='.$banner->getId(), array('method' => 'delete', 'confirm' => '¿Estas seguro?','class'=>'btn-mini btn-black btn-cross')) ?>
      </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
  </tbody>
</table>

</div>