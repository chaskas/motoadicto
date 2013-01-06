<?php

/**
 * sfGuardUserProfile form.
 *
 * @package    motoadicto
 * @subpackage form
 * @author     Rodrigo Campos H. <contacto [at] webdevel.cl>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserProfileForm extends BasesfGuardUserProfileForm
{
  public function configure()
  {
    $years = range(1900,date('Y'));
    $this->widgetSchema['nacimiento_at'] = new sfWidgetFormJQueryDate(array('config' => '{showOn: "button",buttonImage: "/images/icons/calendar.png",buttonImageOnly: true,changeMonth: true,changeYear: true}', 'culture' => 'es'));
    $this->widgetSchema['nacimiento_at']->getOption('date_widget')->setOption('format', '%day%%month%%year%');
    $this->widgetSchema['nacimiento_at']->getOption('date_widget')->setOption('years', array_combine($years, $years));
    
    $this->widgetSchema['sexo'] = new sfWidgetFormChoice(array('choices'=>array(''=>'',0 => 'Femenino',1 => 'Masculino')));
    
    $this->widgetSchema->setFormFormatterName('span');
    
    unset(
            $this['user_id'],
            $this['club_id'],
            $this['avatar'],
            $this['avatar_x1'],
            $this['avatar_x2'],
            $this['avatar_y1'],
            $this['avatar_y2']
    );
  }
}
