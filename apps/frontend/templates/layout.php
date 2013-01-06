<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>

    <div id="container" class="container_12">

      <!-- Header starts -->
      <div id="header" class="grid_12">

        <!-- Logo -->
        <div id="logo" class="grid_4 alpha">
          <a href="<?php echo url_for('@homepage'); ?>">
            <?php //echo image_tag('logo.png'); ?>
          </a>
        </div>

        <div id="login">
          <?php if (!$sf_user->isAuthenticated()): ?>
            <h4 style="float: right;"><span><a href="<?php echo url_for('@sf_guard_signin'); ?>">Login</a> | <a href="<?php echo url_for('user/register'); ?>">Reg&iacute;strate</a></span></h4>
          <?php endif; ?>
          <?php if ($sf_user->isAuthenticated()): ?>
            <h4 style="float: right;"><span>Bienvenido <?php echo $sf_user->getGuardUser()->getUsername(); ?> | <a href="<?php echo url_for('user/profile'); ?>">Perfil</a> | <a href="<?php echo url_for('@sf_guard_signout'); ?>">Logout</a></span></h4>
          <?php endif; ?>
        </div>

        <!-- Menu starts -->
        <div id="navix" class="grid_8 omega">
          <ul id="nav" class="sf-menu">
            <li><a href="<?php echo url_for('@homepage'); ?>">Home</a></li>
            <li><a href="#">Compra / Venta</a></li>
            <li><a href="#">Foros</a></li>
            <li><a href="#">Eventos</a></li>
            <li><a href="<?php echo url_for('club/index'); ?>">Clubes</a></li>
            <li><a href="#">Contacto</a></li>
          </ul>
        </div>
        <!-- //Menu ends// -->

      </div>
      <!-- //Header ends// -->

      <div id="main">
        <?php if ($sf_user->hasFlash('confirmation')): ?>
          <p class="confirmation"><?php echo $sf_user->getFlash('confirmation') ?></p>
        <?php endif ?>

        <?php if ($sf_user->hasFlash('error')): ?>
          <p class="error"><?php echo $sf_user->getFlash('error') ?></p>
        <?php endif ?>
        <?php echo $sf_content ?>
      </div>

      <!-- Footer -->
      <div id="footer">
        <div id="stripez" class="grid_12"></div>

        <!-- Widgets -->
        <div class="widget grid_3">
          <h2 class="widgettitle">MOTO ADICTO</h2>
          <ul>
            <li><a href="<?php echo url_for('@homepage'); ?>">Home</a></li>
            <li><a href="#">Compra / Venta</a></li>
            <li><a href="#">Foros</a></li>
            <li><a href="#">Eventos</a></li>
            <li><a href="<?php echo url_for('club/index'); ?>">Clubes</a></li>
            <li><a href="#">Contacto</a></li>
          </ul>
        </div>

        <!-- Widgets -->
        <div class="widget grid_3">
          <h2 class="widgettitle">Sitios Recomendados</h2>
          <ul>
            <li><a href="#">#######</a></li>
            <li><a href="#">#######</a></li>
            <li><a href="#">#######</a></li>
            <li><a href="#">#######</a></li>
            <li><a href="#">#######</a></li>
          </ul>
        </div>

        <!-- Widgets -->
        <div class="widget grid_3">
          <h2 class="widgettitle">Sobre Nosotros</h2>
          <p>###############</p>
          <ul class="social_icons">
            <li><a href="#"><?php echo image_tag('icons/facebook_16.png'); ?></a></li>
            <li><a href="#"><?php echo image_tag('icons/youtube_16.png'); ?></a></li>
            <li><a href="#"><?php echo image_tag('icons/flickr_16.png'); ?></a></li>
            <li><a href="#"><?php echo image_tag('icons/twitter_16.png'); ?></a></li>

          </ul>
        </div>

        <!-- Widgets -->
        <div class="widget grid_3">
          <h2 class="widgettitle">Contactanos</h2>
          <h5>Email:</h5><p>contacto@motoadicto.cl</p>
          <h5>Cel:</h5><p>(+569) 765 914 71</p>
          <h5>Fax:</h5><p>(+56 41) 318 21 44</p>
        </div>

      </div>
      <!-- //Footer ends// -->

      <!-- Copyrights -->
      <div class="copyrights grid_12">
        Copyrights &copy; 2012 <a href="http://www.webdevel.cl">WebDevel.cl</a> All Rights reserved.
      </div>

    </div>
  </body>
</html>
