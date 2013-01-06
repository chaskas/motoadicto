<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php use_javascript('jquery-ui-1.7.3.custom.min.js'); ?>
<?php use_javascript('jquery.ui.datepicker-es.js'); ?>
<?php use_stylesheet('pepper-grinder/jquery-ui-1.7.3.custom.css'); ?>

<h1>Mi Perfil</h1>
<br/>
<?php echo $form->renderFormTag(url_for('user/UpdateProfile')) ?>
  <div id="form_container">
    <div id="form_main">
      <h3>Datos de la Cuenta</h3>
      <label style="float: left;margin-right: 20px;height:200px;">
        <h4 style="height: 24px;">&nbsp;</h4>
        <p style="width: 220px;text-align: center;">
          <?php if($user_profile->getAvatar() == NULL) : ?>
          <?php echo image_tag('about/staffmember.jpg','class="border_magic" style="margin-bottom: 10px"'); ?>
          <?php endif; ?>
          <?php if($user_profile->getAvatar() != NULL) : ?>
          <img src="<?php echo $user_profile->getImageSrc('avatar', 'normal') ?>" alt="Avatar" class="border_magic" style="margin-bottom: 10px;"/>
          <?php endif; ?>
          <br/>
          <a href="<?php echo url_for('user/EditAvatar'); ?>" class="button">&nbsp;&nbsp;Cambiar&nbsp;&nbsp;&nbsp;</a>
        </p>
        
      </label>
      
      <label style="float: left;margin-right: 20px;">
        <h4 style="float: left;">Nick:</h4><?php echo $form['username']->renderError(); ?>
        <p>
          <?php echo $form['username']->render(); ?>
        </p>
      </label>
      
<!--      <div style="clear:both;">&nbsp;</div>-->
      <label style="float: left;margin-right: 20px;">
        <h4 style="float: left;">Email:</h4><?php echo $form['email_address']->renderError(); ?>
        <p>
          <?php echo $form['email_address']->render(); ?>
        </p>
      </label>
<!--      <div style="clear:both;">&nbsp;</div>-->
      <label style="float: left;margin-right: 20px;">
        <br/>
        <p>
          <a href="<?php echo url_for('user/EditPassword'); ?>" class="button">Cambiar Contraseña</a>
        </p>
      </label>
      <div style="clear:both;">&nbsp;</div>
      <h3>Datos de Personales</h3>
      <label style="float: left;">
        <h4 style="float: left;">Rut:</h4><?php echo $form['Profile']['rut']->renderError(); ?>
        <p>
          <?php echo $form['Profile']['rut']->render(); ?>
        </p>
      </label>
      <div style="clear:both;">&nbsp;</div>
      <label style="float: left;margin-right: 20px;">
        <h4 style="float: left;">Nombre:</h4><?php echo $form['first_name']->renderError(); ?>
        <p>
          <?php echo $form['first_name']->render(); ?>
        </p>
      </label>
      <label style="float: left;">
        <h4 style="float: left;">Apellido:</h4><?php echo $form['last_name']->renderError(); ?>
        <p>
          <?php echo $form['last_name']->render(); ?>
        </p>
      </label>
      <div style="clear:both;">&nbsp;</div>
      <label style="float: left;margin-right: 20px;">
        <h4 style="float: left;">Sexo:</h4><?php echo $form['Profile']['sexo']->renderError(); ?>
        <p>
          <?php echo $form['Profile']['sexo']->render(array('style'=>'width: 220px;')); ?>
        </p>
      </label>
      <label style="float: left;">
        <h4 style="float: left;">Fecha de Nacimiento:</h4><?php echo $form['Profile']['nacimiento_at']->renderError(); ?>
        <p>
          <?php echo $form['Profile']['nacimiento_at']->render(); ?>
        </p>
      </label>
      <div style="clear:both;">&nbsp;</div>
      <label style="float: left;margin-right: 20px;">
        <h4 style="float: left;">Direcci&oacute;n:</h4><?php echo $form['Profile']['direccion']->renderError(); ?>
        <p>
          <?php echo $form['Profile']['direccion']->render(array('style'=>'width: 440px;')); ?>
        </p>
      </label>
      <div style="clear:both;">&nbsp;</div>
      <label style="float: left;margin-right: 20px;">
        <h4 style="float: left;">Comuna</h4><?php echo $form['Profile']['comuna']->renderError(); ?>
        <p>
          <?php echo $form['Profile']['comuna']->render(); ?>
        </p>
      </label>
      <label style="float: left;">
        <h4 style="float: left;">Ciudad:</h4><?php echo $form['Profile']['ciudad']->renderError(); ?>
        <p>
          <?php echo $form['Profile']['ciudad']->render(); ?>
        </p>
      </label>
      <div style="clear:both;">&nbsp;</div>
      <label style="float: left;margin-right: 20px;">
        <h4 style="float: left;">Regi&oacute;n</h4><?php echo $form['Profile']['region']->renderError(); ?>
        <p>
          <?php echo $form['Profile']['region']->render(); ?>
        </p>
      </label>
      <label style="float: left;">
        <h4 style="float: left;">Pa&iacute;s:</h4><?php echo $form['Profile']['pais']->renderError(); ?>
        <p>
          <?php echo $form['Profile']['pais']->render(); ?>
        </p>
      </label>
      <div style="clear:both;">&nbsp;</div>
      <label style="float: left;margin-right: 20px;">
        <h4 style="float: left;">Tel&eacute;fono:</h4><?php echo $form['Profile']['telefono']->renderError(); ?>
        <p>
          <?php echo $form['Profile']['telefono']->render(); ?>
        </p>
      </label>
      <label style="float: left;">
        <h4 style="float: left;">Sitio Web:</h4><?php echo $form['Profile']['sitio_web']->renderError(); ?>
        <p>
          <?php echo $form['Profile']['sitio_web']->render(); ?>
        </p>
      </label>
      <div style="clear:both;padding-top: 20px;width:455px;">
        <input type="submit" id="submit" value="Guardar" class="button" style="float:right"/>
      </div>
      <div style="clear:both;">&nbsp;</div>
      <?php echo $form->renderHiddenFields() ?>
      <h3>Mi Club</h3>
      <label style="float: left;margin-right: 20px;height:200px;">
        <h4 style="height: 24px;">&nbsp;</h4>
        <p style="width:570px;text-align: center;">
          
          <?php if($user_profile->getClub()->getLogo() == NULL) : ?>
            <?php echo image_tag('about/staffmember.jpg','class="border_magic" style="margin-bottom: 10px"'); ?>
          <?php endif; ?>
          
          <?php if($user_profile->getClub()->getLogo() != NULL) : ?>
            <a href="<?php echo url_for('club/show?id='.$user_profile->getClubId()); ?>">
              <img src="<?php echo $user_profile->getClub()->getImageSrc('logo', 'normal') ?>" alt="Logo" class="border_magic" style="margin-bottom: 10px;"/>
            </a>
          <?php endif; ?>
          
          <br/>
          
          <?php if($user_profile->hasClub() && $user_profile->getClub()->isOwner($user_profile->getUserId())) : ?>
            <a href="<?php echo url_for('club/edit'); ?>" class="button">Administrar</a>
          <?php elseif($user_profile->hasClub() && !$user_profile->getClub()->isOwner($user_profile->getUserId())) : ?>
            <?php echo link_to('Abandonar', 'user/LeaveClub', array('confirm' => '¿Estás seguro?','class'=>'button')) ?>
          <?php else : ?>
            <a href="<?php echo url_for('club/index'); ?>" class="button">Unirme a uno</a>
          <?php endif; ?>
            
        </p>
      </label>
    </div>
  </div>
</form>

