<?php

/**
 * user actions.
 *
 * @package    motoadicto
 * @subpackage user
 * @author     Rodrigo Campos H. <contacto [at] webdevel.cl>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userActions extends sfActions {

  /**
   * Executes index action
   *
   * @param sfRequest $request A request object
   */
  public function executeRegister(sfWebRequest $request) {
    if ($this->getUser()->isAuthenticated())
      $this->redirect('@homepage');

    $this->form = new UserRegisterForm();
    if ($request->isMethod('post')) {
      $this->form->bind($request->getParameter('sf_guard_user'));
      
      $captcha = array(
          'recaptcha_challenge_field' => $request->getParameter('recaptcha_challenge_field'),
          'recaptcha_response_field' => $request->getParameter('recaptcha_response_field'),
      );
      $this->form->bind(array_merge($request->getParameter($this->form->getName()), array('captcha' => $captcha)));
      
      if ($this->form->isValid()) {
        $this->form->save();
        $this->getUser()->setFlash('confirmation', 'Bienvenido! '.$this->form['username']->getValue());
        $this->getUser()->signIn($this->form->getObject());
        $this->redirect('@homepage');
      }
    }
  }
  public function executeProfile(sfWebRequest $request){
    $this->forward404Unless($user = Doctrine_Core::getTable('sfGuardUser')->find(array($this->getUser()->getGuardUser()->getId())), sprintf('Object user does not exist (%s).', $this->getUser()->getGuardUser()->getId()));
    $this->form = new UserProfileForm($user);
    $this->user_profile = $this->getUser()->getGuardUser()->getProfile();
  }
  public function executeUpdateProfile(sfWebRequest $request) {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($user = Doctrine_Core::getTable('sfGuardUser')->find(array($this->getUser()->getGuardUser()->getId())), sprintf('Object user does not exist (%s).', $this->getUser()->getGuardUser()->getId()));
    $this->form = new UserProfileForm($user);
    $this->user_profile = $this->getUser()->getGuardUser()->getProfile();
    $this->processProfileForm($request, $this->form);

    $this->setTemplate('profile');
  }
  protected function processProfileForm(sfWebRequest $request, sfForm $form) {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid()) {
      $form->save();
      $this->getUser()->setFlash('confirmation', 'Perfil modificado exitosamente!');
      $this->redirect('user/profile');
    }
  }
  public function executeEditAvatar() {
    $this->forward404Unless($avatar = $this->getUser()->getGuardUser()->getProfile(), sprintf('Object sfGuardUserProfile does not exist (%s).', $this->getUser()->getGuardUser()->getId()));
    $this->form = new UserProfileAvatarForm($avatar);
  }
  public function executeUpdateAvatar(sfWebRequest $request) {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($avatar = $this->getUser()->getGuardUser()->getProfile(), sprintf('Object sfGuardUserProfile does not exist (%s).', $this->getUser()->getGuardUser()->getId()));
    $this->form = new UserProfileAvatarForm($avatar);

    $this->processAvatarForm($request, $this->form);

    $this->setTemplate('EditAvatar');
  }
  protected function processAvatarForm(sfWebRequest $request, sfForm $form) {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid()) {
      $form->save();
      $this->getUser()->setFlash('confirmation', 'Avatar modificada exitosamente!');
      $this->redirect('user/profile');
    }
  }
  public function executeEditPassword() {
    $this->forward404Unless($user = $this->getUser()->getGuardUser(), sprintf('Object sfGuardUser does not exist (%s).', $this->getUser()->getGuardUser()->getId()));
    $this->form = new UserPasswordForm($user);
  }
  public function executeUpdatePassword(sfWebRequest $request) {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($user = $this->getUser()->getGuardUser(), sprintf('Object sfGuardUser does not exist (%s).', $this->getUser()->getGuardUser()->getId()));
    $this->form = new UserPasswordForm($user);
    $this->processPasswordForm($request, $this->form);

    $this->setTemplate('EditPassword');
    
  }
  protected function processPasswordForm(sfWebRequest $request, sfForm $form) {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid()) {
      $form->save();
      $this->getUser()->setFlash('confirmation', 'Password modificada exitosamente!');
      $this->redirect('user/profile');
    }
  }
  public function executeLeaveClub(sfWebRequest $request)
  {
//    $request->checkCSRFProtection();

    $this->forward404Unless($club = $this->getUser()->getGuardUser()->getProfile()->getClub(), sprintf('Object club does not exist (%s).', $request->getParameter('id')));

    $user_profile = $this->getUser()->getGuardUser()->getProfile();
    $user_profile->setClubId(null);
    $user_profile->save();

    $this->redirect('user/profile');
  }

  public function executeProfileClub(sfWebRequest $request)
  {
    $this->user_profile = $this->getUser()->getGuardUser()->getProfile();
  }

  public function executeDeleteRequest(sfWebRequest $request)
  {
    $club_candidate = Doctrine::getTable('ClubCandidate')->findOneByUserId($request->getParameter('id'));
    $club_candidate->delete();
    $this->redirect('user_profile_club');
  }
}