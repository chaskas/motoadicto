<?php

/**
 * home actions.
 *
 * @package    motoadicto
 * @subpackage home
 * @author     Rodrigo Campos H. <contacto [at] webdevel.cl>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homeActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->sliders = Doctrine_Core::getTable('Banner')
      ->createQuery('a')
      ->execute();
  }
  public function executeError404(sfWebRequest $request)
  {
  }
}
