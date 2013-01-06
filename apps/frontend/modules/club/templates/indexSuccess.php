<h1>&Uacute;ltimos Clubes Incorporados</h1>
<br/>

<?php $j=1; ?>
<?php foreach ($clubs as $club) : ?>

<div class="grid_4 portfolio_item">
  <?php echo link_to(image_tag($club->getImageSrc('logo', 'grande')), 'club_show', $club) ?>
  <center><h3><?php echo $club->getNombre() ?></h3></center>
</div>
<?php if($j%5==0)echo "<div style='clear: both;'></div>"; ?>
<?php $j++; ?>
<?php endforeach; ?>

<!--<div id="ev_pagenavi" class="grid_12">
  <div class="wp-pagenavi">
    <span class="pages">Página 1 of 2</span>
    <span class="current">1</span>
    <a href="#" class="page" title="2">2</a>
    <a href="#" class="nextpostslink">&raquo;</a>
  </div>
</div>-->
