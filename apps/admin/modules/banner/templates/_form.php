<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php use_javascript('jquery.Jcrop.min.js'); ?>
<?php use_stylesheet('jquery.Jcrop.css'); ?>

<div class="x12">
  <form action="<?php echo url_for('banner/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?id=' . $form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?> class="form label-inline uniform">
    <?php if (!$form->getObject()->isNew()): ?>
      <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>


    <div class="field">
      <label for="titulo"><?php echo $form['titulo']->renderLabel(); ?></label>
      <?php echo $form['titulo']->render(array('size' => 100)) ?>
    </div>
    <div class="field">
      <label for="descripcion"><?php echo $form['descripcion']->renderLabel(); ?></label>
      <?php echo $form['descripcion']->render(array('size' => 100)) ?>
    </div>
      <div class="field">
      <center>
      <table >
        <tr>
          <td>
            <?php echo $form['slide']->render() ?>
          </td>
        </tr>
      </table>
      </center>
      </div>
    
    <br/>

    <div class="buttonrow">
      <a href="<?php echo url_for('banner/index') ?>">Volver</a>&nbsp;&nbsp;
      <?php if (!$form->getObject()->isNew()): ?>
      &nbsp;&nbsp;<?php echo link_to('Borrar', 'banner/delete?id=' . $form->getObject()->getId(), array('method' => 'delete', 'confirm' => '¿Estás Seguro?')) ?>
      <?php endif; ?>&nbsp;&nbsp;
      <button class="btn">Guardar</button>
    </div>
    <?php echo $form->renderHiddenFields(); ?>

  </form>
</div>