<?php

class estudianteActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->estudiantes = Doctrine_Core::getTable('Estudiante')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new EstudianteForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new EstudianteForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($estudiante = Doctrine_Core::getTable('Estudiante')->find(array($request->getParameter('id'))), sprintf('Object estudiante does not exist (%s).', $request->getParameter('id')));
    $this->form = new EstudianteForm($estudiante);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($estudiante = Doctrine_Core::getTable('Estudiante')->find(array($request->getParameter('id'))), sprintf('Object estudiante does not exist (%s).', $request->getParameter('id')));
    $this->form = new EstudianteForm($estudiante);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($estudiante = Doctrine_Core::getTable('Estudiante')->find(array($request->getParameter('id'))), sprintf('Object estudiante does not exist (%s).', $request->getParameter('id')));
    $estudiante->delete();

    $this->redirect('estudiante/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $estudiante = $form->save();

      $this->redirect('estudiante/index');
    }
  }
}