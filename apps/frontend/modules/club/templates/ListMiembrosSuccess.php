<?php use_helper('jQuery'); ?>
<script>

	Cufon.refresh();

</script>
<h1>Postulantes</h1>
  <div id="postulantes" >
    <table style="width: 300px;">
    <?php foreach($club->getCandidatos() as $candidato) : ?>
      <tr>
        <td style="vertical-align: middle;width: 60px;">
          <?php if ($candidato->getSfGuardUser()->getProfile()->getAvatar() == null) : ?>
            <?php echo image_tag('about/staffmember-mini.jpg', 'class="border_magic"'); ?>
          <?php else : ?>
            <img src="<?php echo $candidato->getSfGuardUser()->getProfile()->getImageSrc('avatar', 'mini') ?>" alt="Avatar" class="border_magic" />
          <?php endif; ?>
        </td>
        <td style="vertical-align: middle;padding-left: 20px;">
          <h5 style="margin-top: 5px;"><?php echo $candidato->getSfGuardUser()->getUsername(); ?></h5>
        </td>
        <td style="vertical-align: middle;width: 100px;">
          <?php echo link_to(image_tag('icons/resume_16.png','alt=Info,title=Informaci&oacute;n'),'@homepage'); ?>
          &nbsp;
          <?php echo link_to(image_tag('icons/message_16.png','alt=Mensaje,title=Enviar Mensaje'),'@homepage'); ?>
          &nbsp;
          <?php echo jq_link_to_remote(image_tag('icons/check_mark_16.png','alt=Aprobar,title=Aprobar Postulaci&oacute;n'),array('update'=>'miembros-postulantes','url'=>'club/addMember?id='.$candidato->getSfGuardUser()->getId()), array('method' => 'delete', 'confirm' => '¿Est&aacute;s Seguro que deseas aprobar esta postulaci&oacute;n?')); ?>
          &nbsp;
          <?php //echo link_to(image_tag('icons/close_16.png','alt=Despedir,title=Eliminar Postulaci&oacute;n'),'@homepage'); ?>
          <?php echo jq_link_to_remote(image_tag('icons/close_16.png','alt=Eliminar,title=Eliminar postulaci&oacute;n'),array('update'=>'miembros-postulantes','url'=>'club/deleteCandidate?id='.$candidato->getSfGuardUser()->getId()), array('method' => 'delete', 'confirm' => '¿Est&aacute;s Seguro que deseas eliminar esta postulaci&oacute;n?')); ?>
        </td>
      </tr>
    <?php endforeach; ?>
    </table>
  </div>

  <h1>Miembros</h1>
  <div id="miembros">
    
    <table style="width: 300px;">
    <?php foreach($club->getMiembros() as $miembro) : ?>
    <?php if(!$club->isOwner($miembro->getSfGuardUser()->getId())) : ?>
      <tr>
        <td style="vertical-align: middle;width: 60px;">
          <?php if ($miembro->getAvatar() == null) : ?>
            <?php echo image_tag('about/staffmember-mini.jpg', 'class="border_magic"'); ?>
          <?php else : ?>
            <img src="<?php echo $miembro->getImageSrc('avatar', 'mini') ?>" alt="Avatar" class="border_magic" />
          <?php endif; ?>
        </td>
        <td style="vertical-align: middle;padding-left: 20px;">
          <h5 style="margin-top: 5px;"><?php echo $miembro->getSfGuardUser()->getUsername(); ?></h5>
        </td>
        <td style="vertical-align: middle;width: 100px;">
          <?php  echo link_to(image_tag('icons/resume_16.png','alt=Info,title=Informaci&oacute;n'),'@homepage'); ?>
          &nbsp;
          <?php echo link_to(image_tag('icons/message_16.png','alt=Mensaje,title=Enviar Mensaje'),'@homepage'); ?>
          &nbsp;
          <?php echo jq_link_to_remote(image_tag('icons/close_16.png','alt=Despedir,title=Despedir'),array('update'=>'miembros-postulantes','url'=>'club/dismissMember?id='.$miembro->getSfGuardUser()->getId()), array('method' => 'delete', 'confirm' => '¿Est&aacute;s Seguro que deseas despedir a este miembro?')); ?>
        </td>
      </tr>
      <?php endif; ?>
    <?php endforeach; ?>
    </table>
  </div>