<div id="form_container">
  <div id="form_main" style="width:  100%;">
    <form action="<?php echo url_for('user/UpdatePassword') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
      <br/><br/>
      <center>
        <div style="width: 220px;">
        <label style="float: left;margin-right: 20px;">
          <h4 style="float: left;">Nueva:</h4><?php echo $form['password']->renderError(); ?>
          <p>
            <?php echo $form['password']->render(); ?>
          </p>
        </label>
        <div style="clear:both;">&nbsp;</div>
        <label style="float: left;margin-right: 20px;">
          <h4 style="float: left;">Repite:</h4><?php echo $form['password_confirmation']->renderError(); ?>
          <p>
            <?php echo $form['password_confirmation']->render(); ?>
          </p>
        </label>
        <div style="clear:both;">&nbsp;</div>
        <?php echo $form->renderHiddenFields() ?>
        <input type="submit" id="submit" value="Guardar" class="button"/>
        </div>
      </center>
  </div>
</div>

</form>