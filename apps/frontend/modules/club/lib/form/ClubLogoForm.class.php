<?php

class ClubLogoForm extends ClubForm {

  public function configure() {
    $this->getObject()->configureJCropWidgets($this);
    $this->getObject()->configureJCropValidators($this);
    
    $this->widgetSchema['logo']->setOption('delete_label', 'Borrar');
    
    if($this->getObject()->getLogo() == ''  || $this->getObject()->getLogo() == NULL){
      $this->widgetSchema['logo']->setOption('template','%input%');
    } else {
      $this->widgetSchema['logo']->setOption('template','<br/>%file%<br/>%delete% %delete_label%<br/><br/>%input%<br/>');
    }
    
    unset(
            $this['user_id'],
            $this['nombre'],
            $this['aniversario_at'],
            $this['ciudad'],
            $this['comuna'],
            $this['region'],
            $this['pais'],
            $this['email'],
            $this['url'],
            $this['descripcion'],
            $this['created_at'],
            $this['updated_at']
    );
  }

}
