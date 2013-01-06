<?php

/**
 * sfGuardUserProfile filter form base class.
 *
 * @package    motoadicto
 * @subpackage filter
 * @author     Rodrigo Campos H. <contacto [at] webdevel.cl>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasesfGuardUserProfileFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'rut'           => new sfWidgetFormFilterInput(),
      'nacimiento_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'sexo'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'direccion'     => new sfWidgetFormFilterInput(),
      'ciudad'        => new sfWidgetFormFilterInput(),
      'comuna'        => new sfWidgetFormFilterInput(),
      'region'        => new sfWidgetFormFilterInput(),
      'pais'          => new sfWidgetFormFilterInput(),
      'telefono'      => new sfWidgetFormFilterInput(),
      'sitio_web'     => new sfWidgetFormFilterInput(),
      'club_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Club'), 'add_empty' => true)),
      'avatar'        => new sfWidgetFormFilterInput(),
      'avatar_x1'     => new sfWidgetFormFilterInput(),
      'avatar_y1'     => new sfWidgetFormFilterInput(),
      'avatar_x2'     => new sfWidgetFormFilterInput(),
      'avatar_y2'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'user_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'rut'           => new sfValidatorPass(array('required' => false)),
      'nacimiento_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'sexo'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'direccion'     => new sfValidatorPass(array('required' => false)),
      'ciudad'        => new sfValidatorPass(array('required' => false)),
      'comuna'        => new sfValidatorPass(array('required' => false)),
      'region'        => new sfValidatorPass(array('required' => false)),
      'pais'          => new sfValidatorPass(array('required' => false)),
      'telefono'      => new sfValidatorPass(array('required' => false)),
      'sitio_web'     => new sfValidatorPass(array('required' => false)),
      'club_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Club'), 'column' => 'id')),
      'avatar'        => new sfValidatorPass(array('required' => false)),
      'avatar_x1'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'avatar_y1'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'avatar_x2'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'avatar_y2'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_user_profile_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfGuardUserProfile';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'user_id'       => 'ForeignKey',
      'rut'           => 'Text',
      'nacimiento_at' => 'Date',
      'sexo'          => 'Boolean',
      'direccion'     => 'Text',
      'ciudad'        => 'Text',
      'comuna'        => 'Text',
      'region'        => 'Text',
      'pais'          => 'Text',
      'telefono'      => 'Text',
      'sitio_web'     => 'Text',
      'club_id'       => 'ForeignKey',
      'avatar'        => 'Text',
      'avatar_x1'     => 'Number',
      'avatar_y1'     => 'Number',
      'avatar_x2'     => 'Number',
      'avatar_y2'     => 'Number',
    );
  }
}
