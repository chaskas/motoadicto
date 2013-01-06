<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<h1>Formulario de Registro</h1>
<br/>
<?php echo $form->renderFormTag(url_for('user/register')) ?>
  <div id="form_container">
    <div id="form_main">
      <label style="float: left;margin-right: 20px;">
        <h4 style="float: left;">Nick:</h4><?php echo $form['username']->renderError(); ?>
        <p>
          <?php echo $form['username']->render(); ?>
        </p>
      </label>
      <div style="clear:both;">&nbsp;</div>
      <label style="float: left;margin-right: 20px;">
        <h4 style="float: left;">Email:</h4><?php echo $form['email_address']->renderError(); ?>
        <p>
          <?php echo $form['email_address']->render(); ?>
        </p>
      </label>
      <div style="clear:both;">&nbsp;</div>
      <label style="float: left;margin-right: 20px;">
        <h4 style="float: left;">Password:</h4><?php echo $form['password']->renderError(); ?>
        <p>
          <?php echo $form['password']->render(); ?>
        </p>
      </label>
      <label style="float: left;margin-right: 20px;">
        <h4 style="float: left;">Repite Password:</h4>
        <p>
          <?php echo $form['password_confirmation']->render(array('style'=>'float: left;')); ?>
        </p>
      </label>
      <div style="clear:both;">&nbsp;</div>
      <label style="float: left;margin-right: 20px;">
        <h4 style="float: left;">Nombre:</h4><?php echo $form['first_name']->renderError(); ?>
        <p>
          <?php echo $form['first_name']->render(); ?>
        </p>
      </label>
      <label style="float: left;margin-bottom: 20px;">
        <h4 style="float: left;">Apellido:</h4><?php echo $form['last_name']->renderError(); ?>
        <p>
          <?php echo $form['last_name']->render(); ?>
        </p>
      </label>
      <div style="clear: both;">&nbsp;</div>
      <div><?php echo $form['captcha']->render() ?></div>
      <br/>
      <input type="submit" id="submit" value="Registrar" class="button"/>
      <div style="clear:both;">&nbsp;</div>
      <?php echo $form->renderHiddenFields() ?>
    </div>
  </div>
</form>
