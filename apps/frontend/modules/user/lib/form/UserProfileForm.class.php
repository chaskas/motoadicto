<?php

class UserProfileForm extends UserRegisterForm {

  public function configure() {
  
  $this->embedRelation('Profile');
    
    // Remove all widgets we don't want to show
    unset(
            $this['is_active'], 
            $this['is_super_admin'], 
            $this['updated_at'], 
            $this['groups_list'],
            $this['permissions_list'], 
            $this['last_login'], 
            $this['created_at'], 
            $this['salt'], 
            $this['algorithm'], 
            $this['captcha'],
            $this['password']
    );
    
    $this->widgetSchema->setFormFormatterName('span');
    
    $this->widgetSchema->setLabel(array(
        'username' => 'Usuario',
        'first_name' => 'Nombre',
    ));
  }
}
