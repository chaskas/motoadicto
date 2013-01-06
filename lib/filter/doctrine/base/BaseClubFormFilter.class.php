<?php

/**
 * Club filter form base class.
 *
 * @package    motoadicto
 * @subpackage filter
 * @author     Rodrigo Campos H. <contacto [at] webdevel.cl>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseClubFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'aniversario_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'descripcion'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'region'         => new sfWidgetFormFilterInput(),
      'ciudad'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'comuna'         => new sfWidgetFormFilterInput(),
      'pais'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'url'            => new sfWidgetFormFilterInput(),
      'email'          => new sfWidgetFormFilterInput(),
      'user_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'logo'           => new sfWidgetFormFilterInput(),
      'logo_x1'        => new sfWidgetFormFilterInput(),
      'logo_y1'        => new sfWidgetFormFilterInput(),
      'logo_x2'        => new sfWidgetFormFilterInput(),
      'logo_y2'        => new sfWidgetFormFilterInput(),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'slug'           => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre'         => new sfValidatorPass(array('required' => false)),
      'aniversario_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'descripcion'    => new sfValidatorPass(array('required' => false)),
      'region'         => new sfValidatorPass(array('required' => false)),
      'ciudad'         => new sfValidatorPass(array('required' => false)),
      'comuna'         => new sfValidatorPass(array('required' => false)),
      'pais'           => new sfValidatorPass(array('required' => false)),
      'url'            => new sfValidatorPass(array('required' => false)),
      'email'          => new sfValidatorPass(array('required' => false)),
      'user_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'logo'           => new sfValidatorPass(array('required' => false)),
      'logo_x1'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'logo_y1'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'logo_x2'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'logo_y2'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'slug'           => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('club_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Club';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'nombre'         => 'Text',
      'aniversario_at' => 'Date',
      'descripcion'    => 'Text',
      'region'         => 'Text',
      'ciudad'         => 'Text',
      'comuna'         => 'Text',
      'pais'           => 'Text',
      'url'            => 'Text',
      'email'          => 'Text',
      'user_id'        => 'ForeignKey',
      'logo'           => 'Text',
      'logo_x1'        => 'Number',
      'logo_y1'        => 'Number',
      'logo_x2'        => 'Number',
      'logo_y2'        => 'Number',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
      'slug'           => 'Text',
    );
  }
}
