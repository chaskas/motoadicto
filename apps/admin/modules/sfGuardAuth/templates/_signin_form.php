<div id="login">
  <div id="login_panel">
    <form action="<?php echo url_for('@sf_guard_signin') ?>" method="post" accept-charset="utf-8">		
      <div class="login_fields">
        <div class="field">
          <label for="email">Username</label>
          <?php echo $form['username']->render(); ?>		
        </div>

        <div class="field">
          <label for="password">Password</label>
          <?php echo $form['password']->render(); ?>
        </div>
      </div>
      <div class="login_actions">
        <button type="submit" class="btn btn-orange" tabindex="3"><?php echo __('Login', null, 'sf_guard') ?></button>
      </div>
      <?php echo $form->renderHiddenFields(); ?>
    </form>
  </div>
</div>