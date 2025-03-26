<?php

/**
 * prestamo actions.
 *
 * @package    SMProject
 * @subpackage prestamo
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class prestamoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->prestamos = Doctrine_Core::getTable('Prestamo')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new PrestamoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PrestamoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($prestamo = Doctrine_Core::getTable('Prestamo')->find(array($request->getParameter('id'))), sprintf('Object prestamo does not exist (%s).', $request->getParameter('id')));
    $this->form = new PrestamoForm($prestamo);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($prestamo = Doctrine_Core::getTable('Prestamo')->find(array($request->getParameter('id'))), sprintf('Object prestamo does not exist (%s).', $request->getParameter('id')));
    $this->form = new PrestamoForm($prestamo);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($prestamo = Doctrine_Core::getTable('Prestamo')->find(array($request->getParameter('id'))), sprintf('Object prestamo does not exist (%s).', $request->getParameter('id')));
    $prestamo->delete();

    $this->redirect('prestamo/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $prestamo = $form->save();

      $this->redirect('estudiante/index');
    }
  }
}
