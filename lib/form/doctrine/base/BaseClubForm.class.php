<?php

/**
 * Club form base class.
 *
 * @method Club getObject() Returns the current form's model object
 *
 * @package    motoadicto
 * @subpackage form
 * @author     Rodrigo Campos H. <contacto [at] webdevel.cl>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseClubForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'nombre'         => new sfWidgetFormInputText(),
      'aniversario_at' => new sfWidgetFormDateTime(),
      'descripcion'    => new sfWidgetFormInputText(),
      'region'         => new sfWidgetFormInputText(),
      'ciudad'         => new sfWidgetFormInputText(),
      'comuna'         => new sfWidgetFormInputText(),
      'pais'           => new sfWidgetFormInputText(),
      'url'            => new sfWidgetFormInputText(),
      'email'          => new sfWidgetFormInputText(),
      'user_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => false)),
      'logo'           => new sfWidgetFormInputText(),
      'logo_x1'        => new sfWidgetFormInputText(),
      'logo_y1'        => new sfWidgetFormInputText(),
      'logo_x2'        => new sfWidgetFormInputText(),
      'logo_y2'        => new sfWidgetFormInputText(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
      'slug'           => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nombre'         => new sfValidatorPass(),
      'aniversario_at' => new sfValidatorDateTime(),
      'descripcion'    => new sfValidatorPass(),
      'region'         => new sfValidatorPass(array('required' => false)),
      'ciudad'         => new sfValidatorPass(),
      'comuna'         => new sfValidatorPass(array('required' => false)),
      'pais'           => new sfValidatorPass(),
      'url'            => new sfValidatorPass(array('required' => false)),
      'email'          => new sfValidatorPass(array('required' => false)),
      'user_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'))),
      'logo'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'logo_x1'        => new sfValidatorInteger(array('required' => false)),
      'logo_y1'        => new sfValidatorInteger(array('required' => false)),
      'logo_x2'        => new sfValidatorInteger(array('required' => false)),
      'logo_y2'        => new sfValidatorInteger(array('required' => false)),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
      'slug'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'Club', 'column' => array('nombre'))),
        new sfValidatorDoctrineUnique(array('model' => 'Club', 'column' => array('user_id'))),
        new sfValidatorDoctrineUnique(array('model' => 'Club', 'column' => array('slug'))),
      ))
    );

    $this->widgetSchema->setNameFormat('club[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Club';
  }

}
