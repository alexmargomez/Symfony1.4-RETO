<?php

/**
 * libro actions.
 *
 * @package    SMProject
 * @subpackage libro
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class libroActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->libros = Doctrine_Core::getTable('Libro')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new LibroForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new LibroForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($libro = Doctrine_Core::getTable('Libro')->find(array($request->getParameter('id'))), sprintf('Object libro does not exist (%s).', $request->getParameter('id')));
    $this->form = new LibroForm($libro);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($libro = Doctrine_Core::getTable('Libro')->find(array($request->getParameter('id'))), sprintf('Object libro does not exist (%s).', $request->getParameter('id')));
    $this->form = new LibroForm($libro);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($libro = Doctrine_Core::getTable('Libro')->find(array($request->getParameter('id'))), sprintf('Object libro does not exist (%s).', $request->getParameter('id')));
    $libro->delete();

    $this->redirect('libro/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $libro = $form->save();

      $this->redirect('estudiante/index');
    }
  }
}
