<?php

/**
 * Banner form.
 *
 * @package    motoadicto
 * @subpackage form
 * @author     Rodrigo Campos H. <contacto [at] webdevel.cl>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BannerForm extends BaseBannerForm {

  public function configure() {
    
    $this->getObject()->configureJCropWidgets($this);
    $this->getObject()->configureJCropValidators($this);
    
  }

}
