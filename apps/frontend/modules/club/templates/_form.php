<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php use_javascript('jquery-ui-1.7.3.custom.min.js'); ?>
<?php use_javascript('jquery.ui.datepicker-es.js'); ?>
<?php use_stylesheet('pepper-grinder/jquery-ui-1.7.3.custom.css'); ?>

<form action="<?php echo url_for('club/'.($form->getObject()->isNew() ? 'create' : 'update')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
  <?php if (!$form->getObject()->isNew()): ?>
  <input type="hidden" name="sf_method" value="put" />
  <?php endif; ?>
  <div id="form_container">
    <?php if (!$form->getObject()->isNew()): ?>
    <div id="form_main" style="margin: 10px;width: 480px;">
      <label style="float: left;margin-right: 20px;height:200px;">
        <h4 style="height: 24px;">&nbsp;</h4>
        <p style="width: 220px;text-align: center;">
          <?php if($club->getLogo() == NULL) : ?>
          <?php echo image_tag('about/staffmember.jpg','class="border_magic" style="margin-bottom: 10px"'); ?>
          <?php endif; ?>
          <?php if($club->getLogo() != NULL) : ?>
          <img src="<?php echo $club->getImageSrc('logo', 'normal') ?>" alt="Logo" class="border_magic" style="margin-bottom: 10px;"/>
          <?php endif; ?>
          <br/>
          <a href="<?php echo url_for('club/EditLogo'); ?>" class="button">&nbsp;&nbsp;Cambiar&nbsp;&nbsp;&nbsp;</a>
        </p>
      </label>
      <?php else : ?>
      <div id="form_main">
      <?php endif; ?>
      <label style="float: left;margin-right: 20px;">
        <h4 style="float: left;">Nombre:</h4><?php echo $form['nombre']->renderError(); ?>
        <p>
          <?php echo $form['nombre']->render(); ?>
        </p>
      </label>
      <label style="float: left;margin-right: 20px;">
        <h4 style="float: left;">Fundado el:</h4><?php echo $form['aniversario_at']->renderError(); ?>
        <div style="clear:both;margin-bottom: 0px;"></div>
        <p>
          <?php echo $form['aniversario_at']->render(); ?>
        </p>
      </label>
      <div style="clear:both;">&nbsp;</div>
      <label style="float: left;margin-right: 20px;">
        <h4 style="float: left;">Ciudad:</h4><?php echo $form['ciudad']->renderError(); ?>
        <p>
          <?php echo $form['ciudad']->render(); ?>
        </p>
      </label>
      <label style="float: left;margin-right: 20px;">
        <h4 style="float: left;">Comuna:</h4>
        <p>
          <?php echo $form['comuna']->render(); ?>
        </p>
      </label>
      <div style="clear:both;">&nbsp;</div>
      <label style="float: left;margin-right: 20px;">
        <h4 style="float: left;">Regi&oacute;n:</h4>
        <p>
          <?php echo $form['region']->render(); ?>
        </p>
      </label>
      <label style="float: left;margin-right: 20px;">
        <h4 style="float: left;">Pa&iacute;s:</h4><?php echo $form['pais']->renderError(); ?>
        <p>
          <?php echo $form['pais']->render(); ?>
        </p>
      </label>
      <div style="clear:both;">&nbsp;</div>
      <label style="float: left;margin-right: 20px;">
        <h4 style="float: left;">Email:</h4><?php echo $form['email']->renderError(); ?>
        <p>
          <?php echo $form['email']->render(); ?>
        </p>
      </label>
      <label style="float: left;">
        <h4 style="float: left;">Sitio Web:</h4>
        <p>
          <?php echo $form['url']->render(); ?>
        </p>
      </label>
      <div style="clear:both;">&nbsp;</div>
      <label style="float: left;margin-right: 20px;">
        <h4 style="float: left;">Descripci&oacute;n:</h4><?php echo $form['descripcion']->renderError(); ?>
        <p>
          <?php echo $form['descripcion']->render(); ?>
        </p>
      </label>
      <br/>
      <div style="clear:both;">&nbsp;</div>
      <input type="submit" id="submit" value="Guardar" class="button"/>
      <div style="clear:both;">&nbsp;</div>
      <?php echo $form->renderHiddenFields() ?>
    </div>
  </div>
</form>
