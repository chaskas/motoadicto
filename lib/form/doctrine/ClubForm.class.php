<?php

/**
 * Club form.
 *
 * @package    motoadicto
 * @subpackage form
 * @author     Rodrigo Campos H. <contacto [at] webdevel.cl>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ClubForm extends BaseClubForm {

  public function configure() {
    unset(
            $this['user_id'], 
            $this['created_at'], 
            $this['updated_at'], 
            $this['logo'], 
            $this['logo_x1'], 
            $this['logo_x2'], 
            $this['logo_y1'], 
            $this['logo_y2']
    );
    
    $years = range(1900,date('Y'));
    $this->widgetSchema['aniversario_at'] = new sfWidgetFormJQueryDate(array('config' => '{showOn: "button",buttonImage: "/images/icons/calendar.png",buttonImageOnly: true,changeMonth: true,changeYear: true}', 'culture' => 'es'));
    $this->widgetSchema['aniversario_at']->getOption('date_widget')->setOption('format', '%day%%month%%year%');
    $this->widgetSchema['aniversario_at']->getOption('date_widget')->setOption('years', array_combine($years, $years));
    
    $this->widgetSchema['descripcion'] = new sfWidgetFormTextarea(array(),array('style'=>'height: 100px; width: 435px;'));
  
    $this->widgetSchema->setFormFormatterName('span');
    
    $this->validatorSchema['nombre'] = new sfValidatorString(array('required' => true));
    $this->validatorSchema['ciudad'] = new sfValidatorString(array('required' => true));
    $this->validatorSchema['pais'] = new sfValidatorString(array('required' => true));
    $this->validatorSchema['email'] = new sfValidatorEmail(array('required' => true));
    
  }
  
  protected function doSave($con = null)
  {
    if($this->isNew){
      $club = $this->getObject();
      $club->setUserId(sfContext::getInstance()->getUser()->getGuardUser()->getId());
    }
 
    return parent::doSave($con);
  }
}
