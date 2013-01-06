<?php use_javascript('jquery.Jcrop.min.js'); ?>
<?php use_stylesheet('jquery.Jcrop.css'); ?>

<div id="form_container">
  <div id="form_main" style="width:  100%;">
    <form action="<?php echo url_for('club/UpdateLogo') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
      <br/><br/>
      <center>
      <?php echo $form['logo']->render(); ?>
      <div style="clear:both;">&nbsp;</div>
      <?php echo $form->renderHiddenFields() ?>
      <input type="submit" id="submit" value="Guardar" class="button"/>
      </center>
  </div>
</div>

</form>