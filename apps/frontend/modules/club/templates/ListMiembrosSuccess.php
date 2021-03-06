<script type="text/javascript">
	Cufon.refresh();
  $(document).ready(function(){
    $('.ajax').click(function(){
        $('#miembros-postulantes').load(this.href);
        return false;
    });
    $('.fancybox').fancybox({
      'autoDimensions'  : false,
      'overlayOpacity'  : 0.8,
      'overlayColor'    : '#000000',
      'height'          : 250,
    });
  });
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
          <?php echo link_to(image_tag('icons/resume_16.png','alt=Info,title=Informaci&oacute;n'),'club/getMemberInfo?id='.$candidato->getSfGuardUser()->getId(),array('class'=>'fancybox')); ?>
          &nbsp;
          <?php echo link_to(image_tag('icons/message_16.png','alt=Mensaje,title=Enviar Mensaje'),'@homepage'); ?>
          &nbsp;
          <?php echo link_to(image_tag('icons/check_mark_16.png','alt=Aprobar,title=Aprobar Postulaci&oacute;n'),'club/addMember?id='.$candidato->getSfGuardUser()->getId(),array('class'=>'ajax', 'confirm' => '¿Est&aacute;s Seguro que deseas aprobar esta postulaci&oacute;n?')); ?>
          &nbsp;
          <?php echo link_to(image_tag('icons/close_16.png','alt=Eliminar,title=Eliminar Postulaci&oacute;n'),'club/deleteCandidate?id='.$candidato->getSfGuardUser()->getId(),array('class'=>'ajax', 'confirm' => '¿Est&aacute;s Seguro que deseas eliminar esta postulaci&oacute;n?')); ?>
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
          <?php echo link_to(image_tag('icons/resume_16.png','alt=Info,title=Informaci&oacute;n'),'club/getMemberInfo?id='.$miembro->getSfGuardUser()->getId(),array('class'=>'fancybox')); ?>
          &nbsp;
          <?php echo link_to(image_tag('icons/message_16.png','alt=Mensaje,title=Enviar Mensaje'),'@homepage'); ?>
          &nbsp;
          <?php echo link_to(image_tag('icons/close_16.png','alt=Despedir,title=Despedir'),'club/dismissMember?id='.$miembro->getSfGuardUser()->getId(),array('class'=>'ajax', 'confirm' => '¿Est&aacute;s Seguro que deseas despedir a este miembro?')); ?>
        </td>
      </tr>
      <?php endif; ?>
    <?php endforeach; ?>
    </table>
  </div>