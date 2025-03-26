<?php

/**
 * Prestamo form.
 *
 * @package    SMProject
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PrestamoForm extends BasePrestamoForm
{
  public function configure()
  {
    // Load available books
    $libros = Doctrine_Core::getTable('Libro')->createQuery('a')->where('a.prestado = ?', 0)->execute();
    $choices = array();
    foreach ($libros as $libro) {
      $choices[$libro->getId()] = $libro->getTitulo();
    }
    $this->widgetSchema['libro_id'] = new sfWidgetFormChoice(array('choices' => $choices));
    $this->validatorSchema['libro_id'] = new sfValidatorChoice(array('choices' => array_keys($choices)));

    // Load students
    $estudiantes = Doctrine_Core::getTable('Estudiante')->createQuery('a')->execute();
    $choices = array();
    foreach ($estudiantes as $estudiante) {
      $choices[$estudiante->getId()] = $estudiante->getNombreCompleto();
    }
    $this->widgetSchema['estudiante_id'] = new sfWidgetFormChoice(array('choices' => $choices));
    $this->validatorSchema['estudiante_id'] = new sfValidatorChoice(array('choices' => array_keys($choices)));

    // Set the date fields
    unset($this->widgetSchema['fecha_prestamo']);
    unset($this->validatorSchema['fecha_prestamo']);
  
  }
}
