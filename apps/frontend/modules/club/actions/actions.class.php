<?php

/**
 * club actions.
 *
 * @package    motoadicto
 * @subpackage club
 * @author     Rodrigo Campos H. <contacto [at] webdevel.cl>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class clubActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->clubs = Doctrine_Core::getTable('Club')
      ->createQuery('a')
      ->where('logo != ?','null')
     ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->club = $this->getRoute()->getObject();
    $this->forward404Unless($this->club);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->forward404Unless(!$this->getUser()->getGuardUser()->getProfile()->hasClub(), sprintf('Ya tienes un club, puedes editarlo haciendo click aqui', ''));
    $this->form = new ClubForm();
    $this->club = new Club();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));
    $this->club = new Club();
    $this->form = new ClubForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($club = $this->getUser()->getGuardUser()->getProfile()->getClub(), sprintf('Object club does not exist (%s).', $this->getUser()->getGuardUser()->getProfile()->getClub()->getId()));
    $this->forward404Unless($this->getUser()->getGuardUser()->getProfile()->getUserId() == $club->getOwner());
    $this->club = $this->getUser()->getGuardUser()->getProfile()->getClub();
    $this->form = new ClubForm($club);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($club = $this->getUser()->getGuardUser()->getProfile()->getClub(), sprintf('Object club does not exist (%s).', $this->getUser()->getGuardUser()->getProfile()->getClub()->getId()));
    $this->forward404Unless($this->getUser()->getGuardUser()->getProfile()->getUserId() == $club->getOwner());
    $this->form = new ClubForm($club);
    $this->club = $this->getUser()->getGuardUser()->getProfile()->getClub();
    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($club = $this->getUser()->getGuardUser()->getProfile()->getClub(), sprintf('Object club does not exist (%s).', $request->getParameter('id')));
    $this->forward404Unless($this->getUser()->getGuardUser()->getProfile()->getUserId() == $club->getOwner());
    $club->delete();

    $this->redirect('club/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $club = $form->save();
      if($form->isNew()){
        $user_profile = $this->getUser()->getGuardUser()->getProfile();
        $user_profile->setClubId($club->getId());
        $user_profile->save();
        $this->getUser()->setFlash('confirmation', 'Club creado exitosamente!');
      } else {
        $this->getUser()->setFlash('confirmation', 'Club modificado exitosamente!');
      }
      $this->redirect('club/edit');
    }
  }
  public function executeEditLogo() {
    $this->forward404Unless($club = $this->getUser()->getGuardUser()->getProfile()->getClub(), sprintf('Object Club does not exist (%s).', $this->getUser()->getGuardUser()->getProfile()->getClub()->getId()));
    $this->form = new ClubLogoForm($club);
  }
  public function executeUpdateLogo(sfWebRequest $request) {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($club = $this->getUser()->getGuardUser()->getProfile()->getClub(), sprintf('Object sfGuardUserProfile does not exist (%s).', $this->getUser()->getGuardUser()->getProfile()->getClub()->getId()));
    $this->form = new ClubLogoForm($club);

    $this->processLogoForm($request, $this->form);

    $this->setTemplate('EditLogo');
  }
  protected function processLogoForm(sfWebRequest $request, sfForm $form) {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid()) {
      $form->save();
      $this->getUser()->setFlash('confirmation', 'Logo modificado exitosamente!');
      $this->redirect('club/edit');
    }
  }
  public function executeSubmit(){
    $club = $this->getRoute()->getObject();
    $user = $this->getUser()->getGuardUser();
    $this->forward404Unless(!$user->getProfile()->hasClub(), sprintf('Ya tienes un club.  No te puedes unir a otro', ''));
    $this->forward404Unless($user);
    $this->forward404Unless($club);

    $club_candidate = new ClubCandidate();

    $this->form = new ClubCandidateForm($club_candidate);

    $this->form->bind(array('user_id'=>$user->getId(),'club_id'=>$club->getId()));

    if($this->form->isValid()){
      $this->form->save();
      $this->getUser()->setFlash('confirmation', "Se ha enviado tu postulación a ".$club->getNombre().". Pronto recibirás noticias...");
      $this->redirect('club_show',$club);
    } else {
      $this->form->hasErrors() ? $lla = "si" : $lla = "no";
      $this->getUser()->setFlash('error', 'Ha ocurrido un error, ponte en contacto con el Administrador...');
      $this->redirect('club_show',$club);
    }
  }
  public function executeListMiembros(sfWebRequest $request)
  {
    $this->forward404Unless($club = $this->getUser()->getGuardUser()->getProfile()->getClub(), sprintf('Object club does not exist (%s).', $this->getUser()->getGuardUser()->getProfile()->getClub()->getId()));
    $this->forward404Unless($this->getUser()->getGuardUser()->getProfile()->getUserId() == $club->getOwner());
    $this->club = $this->getUser()->getGuardUser()->getProfile()->getClub();
  }
  public function executeAddMember(sfWebRequest $request)
  {
    $postulante = Doctrine::getTable('sfGuardUser')->find($request->getParameter('id'));
    $postulante->getProfile()->setClubId($this->getUser()->getGuardUser()->getProfile()->getClub()->getId());
    $postulante->save();

    $club_candidate = Doctrine::getTable('ClubCandidate')->findOneByUserId($request->getParameter('id'));
    $club_candidate->delete();

    $this->redirect('club_ListMiembros'); 
  }
}

