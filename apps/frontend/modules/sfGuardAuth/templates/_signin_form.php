<h1>Login</h1>

<br/>
<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post" accept-charset="utf-8">
  <div id="form_container">
    <div id="form_main">
      <center>
      <label style="float: left;margin-right: 20px;">
        <h4 style="float: left;">Usuario:</h4>
        <p>
          <?php echo $form['username']->render(); ?>
        </p>
        <?php echo $form['username']->renderError(); ?>
      </label>
      
      <label style="float: left;margin-right: 20px;">
        <h4 style="float: left;">Password:</h4>
        <p>
          <?php echo $form['password']->render(); ?>
        </p>
        <?php echo $form['password']->renderError(); ?>
      </label>
      <label style="float: left;margin-top: 45px;">
      <input type="submit" id="submit" value="<?php echo __('Entrar', null, 'sf_guard') ?>" class="button"/>
      </label>
      <div style="clear:both;">&nbsp;</div>
      <?php echo $form->renderHiddenFields() ?>
      </center>
    </div>
  </div>
</form>
