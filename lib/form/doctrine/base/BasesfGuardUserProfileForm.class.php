<?php

/**
 * sfGuardUserProfile form base class.
 *
 * @method sfGuardUserProfile getObject() Returns the current form's model object
 *
 * @package    motoadicto
 * @subpackage form
 * @author     Rodrigo Campos H. <contacto [at] webdevel.cl>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasesfGuardUserProfileForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'user_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => false)),
      'rut'           => new sfWidgetFormInputText(),
      'nacimiento_at' => new sfWidgetFormDateTime(),
      'sexo'          => new sfWidgetFormInputCheckbox(),
      'direccion'     => new sfWidgetFormInputText(),
      'ciudad'        => new sfWidgetFormInputText(),
      'comuna'        => new sfWidgetFormInputText(),
      'region'        => new sfWidgetFormInputText(),
      'pais'          => new sfWidgetFormInputText(),
      'telefono'      => new sfWidgetFormInputText(),
      'sitio_web'     => new sfWidgetFormInputText(),
      'club_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Club'), 'add_empty' => true)),
      'avatar'        => new sfWidgetFormInputText(),
      'avatar_x1'     => new sfWidgetFormInputText(),
      'avatar_y1'     => new sfWidgetFormInputText(),
      'avatar_x2'     => new sfWidgetFormInputText(),
      'avatar_y2'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'user_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'))),
      'rut'           => new sfValidatorPass(array('required' => false)),
      'nacimiento_at' => new sfValidatorDateTime(),
      'sexo'          => new sfValidatorBoolean(),
      'direccion'     => new sfValidatorPass(array('required' => false)),
      'ciudad'        => new sfValidatorPass(array('required' => false)),
      'comuna'        => new sfValidatorPass(array('required' => false)),
      'region'        => new sfValidatorPass(array('required' => false)),
      'pais'          => new sfValidatorPass(array('required' => false)),
      'telefono'      => new sfValidatorPass(array('required' => false)),
      'sitio_web'     => new sfValidatorPass(array('required' => false)),
      'club_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Club'), 'required' => false)),
      'avatar'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'avatar_x1'     => new sfValidatorInteger(array('required' => false)),
      'avatar_y1'     => new sfValidatorInteger(array('required' => false)),
      'avatar_x2'     => new sfValidatorInteger(array('required' => false)),
      'avatar_y2'     => new sfValidatorInteger(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'sfGuardUserProfile', 'column' => array('user_id'))),
        new sfValidatorDoctrineUnique(array('model' => 'sfGuardUserProfile', 'column' => array('rut'))),
      ))
    );

    $this->widgetSchema->setNameFormat('sf_guard_user_profile[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfGuardUserProfile';
  }

}
