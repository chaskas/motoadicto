<div class="post_wrapper">
  <?php if ($club->getLogo() == NULL) : ?>
    <?php echo image_tag('about/staffmember.jpg', 'class="border_magic" style="margin-bottom: 10px"'); ?>
  <?php endif; ?>

  <?php if ($club->getLogo() != NULL) : ?>
    <img src="<?php echo $club->getImageSrc('logo', 'grande') ?>" alt="Logo" class="border_magic" style="margin: 0px 20px 20px 10px ; float:left;"/>
  <?php endif; ?>
  <div class="grid_10 alpha omega info_wrap">
    <div class="grid_7 alpha omega post_heading">
      <h1 style="float:left;"><?php echo $club->getNombre(); ?></h1>
      <?php if ($sf_user->isAuthenticated()): ?>
        <?php if ($sf_user->getGuardUser()->getProfile()->hasClub() && $club->isOwner($sf_user->getGuardUser()->getId())) : ?>
          <a href="<?php echo url_for('club/edit') ?>" style="margin-left: 20px;top: 9px !important;position: relative;" class="button">Administrar</a>
        <?php elseif (!$sf_user->getGuardUser()->getProfile()->hasClub()) : ?>
          <?php if(!$sf_user->getGuardUser()->getProfile()->isCandidate()){
            echo link_to('Unirme','club_submit',$club,array('class'=>'button','style'=>'margin-left: 20px;top:9px !important;position:relative;','confirm' => "¿Seguro que quieres postular a ".$club->getNombre()."?"));
          } else {
            echo "<a class='button' style='margin-left: 20px;top:9px !important;position:relative;'>Ya est&aacute;s Postulando...</a>";
          }
          ?>
        <?php endif; ?>
      <?php endif; ?>
    </div>
    <div class="grid_1 alpha omega date">
      <h3 style="float:left;margin: 5px;">Fundado el:</h3>
      <h1 style="top: 0px;"><?php echo Motoadicto::getDay($club->getAniversarioAt()); ?></h1>
      <h4 style="top: 0px;"><?php echo Motoadicto::getMonth($club->getAniversarioAt()); ?></h4>
      <h5 style="top: 18px;"><?php echo Motoadicto::getYear($club->getAniversarioAt()); ?></h5>
    </div>
  </div>
  <div>
    <div style="float:left;width: 180px;"><h4>Ciudad:</h4><br/><?php echo $club->getCiudad(); ?></div>
    <?php if ($club->hasComuna()) : ?>
      <div style="float:left;width: 180px;"><h4>Comuna:</h4><br/><?php echo $club->getComuna(); ?></div>
    <?php endif; ?>
    <?php if ($club->hasRegion()) : ?>
      <div style="float:left;width: 180px;"><h4>Regi&oacute;n:</h4><br/><?php echo $club->getRegion(); ?></div>
    <?php endif; ?>
    <div style="float:left;width: 180px;"><h4>Pa&iacute;s:</h4><br/><?php echo $club->getPais(); ?></div>
  </div>
  <!--  <div style="clear: both;"></div>-->
  <div>
    <div style="float:left;width: 300px;"><h4>Email:</h4><br/><?php echo $club->getEmail(); ?></div>
    <?php if ($club->hasUrl()) : ?>
      <div style="float:left;width: 300px;"><h4>Sitio Web:</h4><br/><?php echo $club->getUrl(); ?></div>
    <?php endif; ?>
  </div>
  <div style="clear: both;"></div>
  <?php if ($club->hasDescripcion()) : ?>
    <h4>Descripci&oacute;n</h4>  
    <p style="text-align: justify;"><?php echo $club->getDescripcion(); ?></p>
  <?php endif; ?>
  <div style="clear: both;margin-top: 20px;"></div>
  <div class="alpha omega info_wrap">
    <div class="alpha omega">
      <h1>Miembros</h1>
    </div>
  </div>
  <br/>
  <?php $j=1; ?>
  <?php foreach ($club->getMiembros() as $miembro) : ?>
    <?php if ($miembro->getAvatar() == null) : ?>
      <div class="grid_0 center">
        <?php echo image_tag('about/staffmember.jpg', 'class="border_magic"'); ?>
        <center><h4><?php echo $miembro->getSfGuardUser()->getUsername(); ?></h4></center>
      </div>
    <?php else : ?>
      <div class="grid_0 center">
        <img src="<?php echo $miembro->getImageSrc('avatar', 'normal') ?>" alt="Avatar" class="border_magic" />
        <center><h4><?php echo $miembro->getSfGuardUser()->getUsername(); ?></h4></center>
      </div>
    <?php endif; ?>
  <?php if($j%8==0)echo "<div style='clear:both;'>&nbsp;<hr/>&nbsp;</div>"; ?>
  <?php $j++; ?>
  <?php endforeach; ?>
</div>
