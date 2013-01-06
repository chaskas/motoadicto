<script>
  $(function () {
    $('#slider1').anythingSlider({
      startStopped    : false, // If autoPlay is on, this can force it to start stopped
      width           : 920,  // Override the default CSS width
      delay           : 5000,
      buildNavigation : false
    });
  });
</script>

<div class="anythingSlider">
  <ul id="slider1">
    <?php foreach ($sliders as $slide) : ?>
      <li>
        <div class="newsflash_container">
          <img src="<?php echo $slide->getImageSrc('slide', 'banner'); ?>" alt="<?php echo $slide->getTitulo(); ?>" />
          <div class="newsflash">
            <h1><?php echo $slide->getTitulo(); ?></h1>
            <p>
              <?php echo $slide->getDescripcion(); ?>
              <br/><br/>
            </p>
            <p>
              <a href="#" class="button">Ver</a>
              <br/><br/>
            </p>
          </div>
        </div>
      </li>
    <?php endforeach; ?>
  </ul>  
</div>

<div id="main">

</div>