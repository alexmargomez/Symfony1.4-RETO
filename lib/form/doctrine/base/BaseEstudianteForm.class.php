<?php
require_once '/home/alexmar/Documentos/Projects/sfProject1.4/lib/form/doctrine/BaseFormDoctrine.class.php';

/**
 * Estudiante form base class.
 *
 * @method Estudiante getObject() Returns the current form's model object
 *
 * @package    SMProject
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEstudianteForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'nombre'    => new sfWidgetFormInputText(),
      'apellidos' => new sfWidgetFormInputText(),
      'email'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nombre'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'apellidos' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('estudiante[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Estudiante';
  }

}
