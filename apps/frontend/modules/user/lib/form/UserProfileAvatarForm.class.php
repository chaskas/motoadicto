<?php

class UserProfileAvatarForm extends sfGuardUserProfileForm {

  public function configure() {
    $this->getObject()->configureJCropWidgets($this);
    $this->getObject()->configureJCropValidators($this);
    
    $this->widgetSchema['avatar']->setOption('delete_label', 'Borrar');
    
    if($this->getObject()->getAvatar() == ''  || $this->getObject()->getAvatar() == NULL){
      $this->widgetSchema['avatar']->setOption('template','%input%');
    } else {
      $this->widgetSchema['avatar']->setOption('template','<br/>%file%<br/>%delete% %delete_label%<br/><br/>%input%<br/>');
    }
    
    unset(
    $this['user_id'],
    $this['rut'],
    $this['nacimiento_at'],
    $this['sexo'],
    $this['direccion'],
    $this['ciudad'],
    $this['comuna'],
    $this['region'],
    $this['pais'],
    $this['telefono'],
    $this['sitio_web'],
    $this['club_id']
    );
  }

}
