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

    <div id="wrapper">

      <div id="top">

        <div class="content_pad">			
          <ul class="right">
            <li><a href="#" class="top_icon"><span class="ui-icon ui-icon-person"></span>Bienvenido <?php echo $sf_user->getGuardUser()->getName(); ?></a></li>
            <li><a href="#" class="new_messages top_alert">1 Mensaje nuevo</a></li>
            <li><a href="#">Opciones</a></li>
            <li><a href="<?php echo url_for('@sf_guard_signout'); ?>">Salir</a></li>
          </ul>
        </div> <!-- .content_pad -->

      </div> <!-- #top -->	

      <div id="header">

        <div class="content_pad">
          <h1><a href="<?php echo url_for('@homepage'); ?>">Dashboard Admin</a></h1>
          <ul id="nav">
            <li class="nav_current nav_icon">
              <a href="<?php echo url_for('@homepage'); ?>">
                <span class="ui-icon ui-icon-home"></span>
                Home
              </a>
            </li>
            <li class="nav_dropdown nav_icon">
              <a href="javascript:;"><span class="ui-icon ui-icon-gripsmall-diagonal-se"></span>Compra / Venta</a>
              <div class="nav_menu">			
                <ul>
                  <li><a href="<?php echo url_for('@homepage'); ?>">Nuevo</a></li>	
                  <li><a href="<?php echo url_for('@homepage'); ?>">Ver Todos</a></li>							
                </ul>
              </div>
            </li>
            <li class="nav_dropdown nav_icon">
              <a href="javascript:;"><span class="ui-icon ui-icon-gripsmall-diagonal-se"></span>Catalogo</a>
              <div class="nav_menu">			
                <ul>
                  <li><a href="<?php echo url_for('@homepage'); ?>">Productos</a></li>	
                  <li><a href="<?php echo url_for('@homepage'); ?>">Categorias</a></li>
                  <li><a href="<?php echo url_for('@homepage'); ?>">Nuevo Producto</a></li>
                </ul>
              </div>
            </li>
            <li class="nav_dropdown nav_icon">
              <a href="javascript:;"><span class="ui-icon ui-icon-gripsmall-diagonal-se"></span>Clubes</a>
              <div class="nav_menu">			
                <ul>
                  <li><a href="<?php echo url_for('@homepage'); ?>">Nuevo</a></li>	
                  <li><a href="<?php echo url_for('@homepage'); ?>">Ver Todos</a></li>							
                </ul>
              </div>
            </li>
            <li class="nav_dropdown nav_icon">
              <a href="javascript:;"><span class="ui-icon ui-icon-gripsmall-diagonal-se"></span>Eventos</a>
              <div class="nav_menu">			
                <ul>
                  <li><a href="<?php echo url_for('@homepage'); ?>">Nuevo</a></li>	
                  <li><a href="<?php echo url_for('@homepage'); ?>">Ver Todos</a></li>							
                </ul>
              </div>
            </li>
            <li class="nav_dropdown nav_icon_only">
              <a href="javascript:;">&nbsp;</a>
              <div class="nav_menu">
                <ul>
                  <li><a href="<?php echo url_for('users/index'); ?>">Usuarios</a></li>
                  <li><a href="#">Encuestas</a></li>
                  <li><a href="#">Auspiciadores</a></li>
                  <li><a href="<?php echo url_for('banner/index'); ?>">Banners</a></li>
                  <li><a href="#">Noticias</a></li>
                  <li><a href="#">Links</a></li>
                </ul>
              </div> <!-- .menu -->
            </li>
          </ul>
        </div> <!-- .content_pad -->

      </div> <!-- #header -->	

      <div id="masthead">

        <div class="content_pad">

          <h1><?php include_slot('titulo') ?></h1>
          <div id="bread_crumbs">
            <a href="<?php echo url_for($sf_context->getModuleName().'/index'); ?>"><?php echo ucfirst($sf_context->getModuleName()) ?></a> / 
            <a href="<?php echo url_for($sf_context->getModuleName().'/'.$sf_context->getActionName()); ?>" class="current_page"><?php echo ucfirst($sf_context->getActionName()); ?></a>				
          </div> <!-- #bread_crumbs -->

        </div> <!-- .content_pad -->

      </div> <!-- #masthead -->	

      <div id="content" class="xgrid">
        <?php echo $sf_content ?>
      </div> <!-- #content -->

      <div id="footer">		
        <div class="content_pad">			
          <p>&copy; 2012 Copyright <a href="http://www.webdevel.cl" target="_blank">WebDevel.cl</a></p>
        </div> <!-- .content_pad -->
      </div> <!-- #footer -->		

    </div>
  </body>
</html>
