<?php

/**
 * Banner filter form base class.
 *
 * @package    motoadicto
 * @subpackage filter
 * @author     Rodrigo Campos H. <contacto [at] webdevel.cl>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseBannerFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'titulo'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'descripcion' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'slide'       => new sfWidgetFormFilterInput(),
      'slide_x1'    => new sfWidgetFormFilterInput(),
      'slide_y1'    => new sfWidgetFormFilterInput(),
      'slide_x2'    => new sfWidgetFormFilterInput(),
      'slide_y2'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'titulo'      => new sfValidatorPass(array('required' => false)),
      'descripcion' => new sfValidatorPass(array('required' => false)),
      'slide'       => new sfValidatorPass(array('required' => false)),
      'slide_x1'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'slide_y1'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'slide_x2'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'slide_y2'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('banner_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Banner';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'titulo'      => 'Text',
      'descripcion' => 'Text',
      'slide'       => 'Text',
      'slide_x1'    => 'Number',
      'slide_y1'    => 'Number',
      'slide_x2'    => 'Number',
      'slide_y2'    => 'Number',
    );
  }
}
