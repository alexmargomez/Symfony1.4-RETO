<?php
require_once '/home/alexmar/Documentos/Projects/sfProject1.4/lib/form/doctrine/BaseFormDoctrine.class.php';

/**
 * Libro form base class.
 *
 * @method Libro getObject() Returns the current form's model object
 *
 * @package    SMProject
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseLibroForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'titulo'   => new sfWidgetFormInputText(),
      'autor'    => new sfWidgetFormInputText(),
      'prestado' => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'titulo'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'autor'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'prestado' => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('libro[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Libro';
  }

}
