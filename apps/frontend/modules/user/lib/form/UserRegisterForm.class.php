<?php
class UserRegisterForm extends sfGuardUserForm
{
  public function configure()
  {
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
      $this['algorithm']
    );
 
    // Setup proper password validation with confirmation
    $this->widgetSchema['password'] = new sfWidgetFormInputPassword();
    $this->validatorSchema['password']->setOption('required', true);
    $this->widgetSchema['password_confirmation'] = new sfWidgetFormInputPassword();
    $this->validatorSchema['password_confirmation'] = clone $this->validatorSchema['password'];
 
    $this->widgetSchema->moveField('password_confirmation', 'after', 'password');
 
    $this->mergePostValidator(new sfValidatorSchemaCompare('password', sfValidatorSchemaCompare::EQUAL, 'password_confirmation', array(), array('invalid' => 'The two passwords must be the same.')));
    
    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
    //$this->widgetSchema->setNameFormat('registro[%s]');
    
    $this->widgetSchema->setFormFormatterName('span');
    
    $this->validatorSchema['first_name'] = new sfValidatorString(array('required'=>true));
    $this->validatorSchema['last_name'] = new sfValidatorString(array('required'=>true));
    $this->validatorSchema['email_address'] = new sfValidatorEmail(array('required'=>true));
    
    $this->widgetSchema->setLabel(array('email_address'=>'Email'));
    
    $this->widgetSchema['captcha'] = new sfWidgetFormReCaptcha(array(
      'public_key' => sfConfig::get('app_recaptcha_public_key'),
      'theme' => 'white',
      'culture'  => 'es'
    ));

    $this->validatorSchema['captcha'] = new sfValidatorReCaptcha(array(
      'private_key' => sfConfig::get('app_recaptcha_private_key')
    ));
  }
}