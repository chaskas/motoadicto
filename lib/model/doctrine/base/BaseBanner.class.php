<?php

/**
 * BaseBanner
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property text $titulo
 * @property text $descripcion
 * 
 * @method text   getTitulo()      Returns the current record's "titulo" value
 * @method text   getDescripcion() Returns the current record's "descripcion" value
 * @method Banner setTitulo()      Sets the current record's "titulo" value
 * @method Banner setDescripcion() Sets the current record's "descripcion" value
 * 
 * @package    motoadicto
 * @subpackage model
 * @author     Rodrigo Campos H. <contacto [at] webdevel.cl>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseBanner extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('banner');
        $this->hasColumn('titulo', 'text', null, array(
             'type' => 'text',
             'notnull' => true,
             ));
        $this->hasColumn('descripcion', 'text', null, array(
             'type' => 'text',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $jcroppable0 = new Doctrine_Template_JCroppable(array(
             'images' => 
             array(
              0 => 'slide',
             ),
             ));
        $this->actAs($jcroppable0);
    }
}