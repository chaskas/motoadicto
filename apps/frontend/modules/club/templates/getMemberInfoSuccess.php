<style type="text/css">
#fancybox-content { border-color: #fac400 !important; }
#fancybox-outer { background: #000; }
</style>
<script type="text/javascript">
  Cufon.refresh();
</script>

<div>
  <div style="float: left;text-align: center;width: 110px;padding: 30px;padding-top: 1.7em;">
    <?php if ($member->getSfGuardUser()->getProfile()->getAvatar() == null) : ?>
      <?php echo image_tag('about/staffmember.jpg', 'class="border_magic"'); ?>
    <?php else : ?>
      <img src="<?php echo $member->getSfGuardUser()->getProfile()->getImageSrc('avatar', 'normal') ?>" alt="Avatar" class="border_magic" />
    <?php endif; ?>
  </div>
  <div style="float: left;">
    <h4>Nick:</h4><?php echo $member->getSfGuardUser()->getUserName(); ?>
    <br/>
    <div style="float:left;width: 150px;">
      <h4>Nombre:</h4><?php echo $member->getSfGuardUser()->getFirstName(); ?>
    </div>
    <div style="float:left;">
      <h4>Apellido:</h4><?php echo $member->getSfGuardUser()->getLastName(); ?>
    </div>
    <div style="clear:both;"></div>
    <h4>Email:</h4><?php echo $member->getSfGuardUser()->getEmailAddress(); ?>
    <br/>
    <h4>Edad:</h4><?php echo $member->getAge(); ?>
  </div>
</div>



