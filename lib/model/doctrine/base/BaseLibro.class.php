<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Libro', 'doctrine');

/**
 * BaseLibro
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $titulo
 * @property string $autor
 * @property boolean $prestado
 * @property Doctrine_Collection $Prestamos
 * 
 * @method integer             getId()        Returns the current record's "id" value
 * @method string              getTitulo()    Returns the current record's "titulo" value
 * @method string              getAutor()     Returns the current record's "autor" value
 * @method boolean             getPrestado()  Returns the current record's "prestado" value
 * @method Doctrine_Collection getPrestamos() Returns the current record's "Prestamos" collection
 * @method Libro               setId()        Sets the current record's "id" value
 * @method Libro               setTitulo()    Sets the current record's "titulo" value
 * @method Libro               setAutor()     Sets the current record's "autor" value
 * @method Libro               setPrestado()  Sets the current record's "prestado" value
 * @method Libro               setPrestamos() Sets the current record's "Prestamos" collection
 * 
 * @package    SMProject
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseLibro extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('libros');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('titulo', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('autor', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('prestado', 'boolean', null, array(
             'type' => 'boolean',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Prestamo as Prestamos', array(
             'local' => 'id',
             'foreign' => 'libro_id'));
    }
}