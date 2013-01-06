<?php

/**
 * ClubCandidate form.
 *
 * @package    motoadicto
 * @subpackage form
 * @author     Rodrigo Campos H. <contacto [at] webdevel.cl>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ClubCandidateForm extends BaseClubCandidateForm {

  public function configure() {
    $this->disableLocalCSRFProtection();

    unset($this['created_at'], $this['updated_at']);
  }

}
