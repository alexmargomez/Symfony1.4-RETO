<?php

/**
 * Libro filter form base class.
 *
 * @package    SMProject
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseLibroFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'titulo'   => new sfWidgetFormFilterInput(),
      'autor'    => new sfWidgetFormFilterInput(),
      'prestado' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'titulo'   => new sfValidatorPass(array('required' => false)),
      'autor'    => new sfValidatorPass(array('required' => false)),
      'prestado' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('libro_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Libro';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'titulo'   => 'Text',
      'autor'    => 'Text',
      'prestado' => 'Boolean',
    );
  }
}
