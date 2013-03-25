<?php if($user_profile->hasClub() && $user_profile->getClub()->getLogo() == NULL) : ?>
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
<?php elseif(!$user_profile->hasClub() && $user_profile->isCandidate()) :?>
  <table>
    <tr><td colspan="3">Est&aacute;s postulando a:</td></tr>
    <tr><td colspan="3">&nbsp;</td></tr>
    <tr>
      <td>
        <?php echo link_to(image_tag($user_profile->getClubCandidate()->getImageSrc('logo', 'mini'),array('alt'=>'Logo','class'=>'border_magic','style'=>'margin-right: 30px;')), 'club_show', $user_profile->getClubCandidate()) ?>
        </a>
      </td>
      <td><h4 style='margin-right:30px'><?php echo link_to($user_profile->getClubCandidate()->getNombre(),'club_show',$user_profile->getClubCandidate()); ?></h4></td>
      <td>
        <?php echo link_to(image_tag('icons/close_16.png',array('alt'=>'Eliminar','title'=>'Eliminar Postulaci&oacute;n','style'=>'margin-top:21px')),'user/deleteRequest?id='.$user_profile->getUserId(),array('class'=>'ajax', 'confirm' => '¿Est&aacute;s Seguro que deseas eliminar tu postulaci&oacute;n?')); ?>

      </td>
    </tr>
  </table>
<?php else : ?>
  <center><a href="<?php echo url_for('club/index'); ?>" class="button">Unirme a uno</a></center>
<?php endif; ?>