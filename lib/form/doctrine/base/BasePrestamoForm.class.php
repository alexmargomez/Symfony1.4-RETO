<?php
require_once '/home/alexmar/Documentos/Projects/sfProject1.4/lib/form/doctrine/BaseFormDoctrine.class.php';

/**
 * Prestamo form base class.
 *
 * @method Prestamo getObject() Returns the current form's model object
 *
 * @package    SMProject
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePrestamoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'libro_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Libro'), 'add_empty' => true)),
      'estudiante_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Estudiante'), 'add_empty' => true)),
      'fecha_prestamo'   => new sfWidgetFormDate(),
      'fecha_devolucion' => new sfWidgetFormDate(),
      'devuelto'         => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'libro_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Libro'), 'required' => false)),
      'estudiante_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Estudiante'), 'required' => false)),
      'fecha_prestamo'   => new sfValidatorDate(array('required' => false)),
      'fecha_devolucion' => new sfValidatorDate(array('required' => false)),
      'devuelto'         => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('prestamo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Prestamo';
  }

}
