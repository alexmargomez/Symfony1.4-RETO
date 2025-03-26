<?php

/**
 * Prestamo
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    SMProject
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Prestamo extends BasePrestamo
{
  public function save(Doctrine_Connection $conn = null)
  {
    // Update the book's status to 'prestado'
    $libro = $this->getLibro();
    $libro->setPrestado(1);
    $libro->save();

 // Call the parent save method
    return parent::save($conn);
  }

}
