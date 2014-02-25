<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * sfWidgetFormPropelChoice represents a choice widget for a model.
 *
 * @package    symfony
 * @subpackage widget
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfWidgetFormPropelChoice.class.php 22261 2009-09-23 05:31:39Z fabien $
 */
class orcaWidgetFormPropelTree extends sfWidgetFormChoice
{
  /**
   * @see sfWidget
   */
  public function __construct($options = array(), $attributes = array())
  {
    $options['choices'] = array();

    parent::__construct($options, $attributes);
  }

  /**
   * Constructor.
   *
   * Available options:
   *
   *  * model:       The model class (required)
   *  * add_empty:   Whether to add a first empty value or not (false by default)
   *                 If the option is not a Boolean, the value will be used as the text value
   *  * method:      The method to use to display object values (__toString by default)
   *  * key_method:  The method to use to display the object keys (getPrimaryKey by default) 
   *  * order_by:    An array composed of two fields:
   *                   * The column to order by the results (must be in the PhpName format)
   *                   * asc or desc
   *  * query_methods: An array of method names listing the methods to execute
   *                 on the model's query object
   *  * criteria:    A criteria to use when retrieving objects
   *  * connection:  The Propel connection to use (null by default)
   *  * multiple:    true if the select tag must allow multiple selections
   *  * peer_method: ignored - only supported for BC purpose
   *
   * @see sfWidgetFormSelect
   */
  protected function configure($options = array(), $attributes = array())
  {
    $this->addRequiredOption('model');
    $this->addOption('add_empty', false);
    $this->addOption('method', '__toString'); 
    $this->addOption('key_method', 'getPrimaryKey');
    $this->addOption('order_by', array("ZoneLeft","ASC"));
    $this->addOption('query_methods', array());
    $this->addOption('criteria', null);
    $this->addOption('connection', null);
    $this->addOption('multiple', false);
    // not used anymore
    $this->addOption('peer_method', 'doSelect');

    parent::configure($options, $attributes);
  }

  /**
   * Returns the choices associated to the model.
   *
   * @return array An array of choices
   */
  public function getChoices()
  {
    $choices = array();
    if (false !== $this->getOption('add_empty'))
    {
      $choices[''] = true === $this->getOption('add_empty') ? '' : $this->getOption('add_empty');
    }

    $criteria = PropelQuery::from($this->getOption('model'));
    if ($this->getOption('criteria'))
    {
      $criteria->mergeWith(clone $this->getOption('criteria'));
    }
    foreach ($this->getOption('query_methods') as $method)
    {
      $criteria->$method();
    }
    if ($order = $this->getOption('order_by'))
    {
      $criteria->orderBy($order[0], $order[1]);
    }
    $object = $criteria->findOne($this->getOption('connection'));
    if($object->getParent())
            $object=$object->getParent();
		$methodKey = $this->getOption('key_method');
    if (!method_exists($this->getOption('model'), $methodKey))
    {
      throw new RuntimeException(sprintf('Class "%s" must implement a "%s" method to be rendered in a "%s" widget', $this->getOption('model'), $methodKey, __CLASS__));
    }

    $methodValue = $this->getOption('method');
    if (!method_exists($this->getOption('model'), $methodValue))
    {
      throw new RuntimeException(sprintf('Class "%s" must implement a "%s" method to be rendered in a "%s" widget', $this->getOption('model'), $methodValue, __CLASS__));
    }
		return $this->treeChoices($object, $methodKey, $methodValue, $criteria);
  }
  
  public function treeChoices($object,$methodKey,$methodValue,$criteria=null)
  {
//      $choices = array();
      
      $choice = new orcaWidgetFormPropelTreeChoice($object->$methodKey(),$object->$methodValue(),$object->getLevel());
      $objects = $object->getChildren($criteria);
      if($objects->count()>0)
      {
          $choice->children = array();
          
          foreach ($objects as $object)
          {
              $choice->children[] = $this->treeChoices($object, $methodKey, $methodValue, clone $this->getOption('criteria'));
          }
      }
      
      return $choice;
      
  }


    public function render($name, $value = null, $attributes = array(), $errors = array())
    {

        if ('[]' != substr($name, -2))
        {
            $name .= '[]';
        }

        if (null === $value)
        {
            $value = array();
        }
        $id = $this->generateId($name, "tree");
        return "<div id='$id'>" . $this->formatChoices($name, $value, $this->getChoices(), $attributes) . "</div>";
    }

    protected function formatChoices($name, $value, $choices, $attributes)
    {
       $html = "<ul>";
       foreach ($choices->children as $choice)/* @var $choice orcaWidgetFormPropelTreeChoice */
       {
           $baseAttributes = array(
            'name'  => $name,
            'type'  => 'checkbox',
            'value' => self::escapeOnce($choice->id),
            'id'    => $id = $this->generateId($name, self::escapeOnce($choice->id)),
          );

          if ((is_array($value) && in_array(strval($choice->id), $value)) || strval($choice->id) == strval($value))
          {
            $baseAttributes['checked'] = 'checked';
          }
          $input = $this->renderTag('input', array_merge($baseAttributes, $attributes));
          $label = $this->renderContentTag('label', self::escapeOnce($choice->lib), array('for' => $id));
          $li = $input.$this->getOption('label_separator').$label;
                  
          
           if(!is_null($choice->children))
           {
               $li .= $this->formatChoices($name, $value, $choice, $attributes);
           }
           
           $html.=$this->renderContentTag('li', $li,array("id"=>$choice->id,"rel"=>"niveau_{$choice->level}"));

       }
       $html .= "</ul>";
       
       return $html;
       
    }
  
  
}

class orcaWidgetFormPropelTreeChoice
{
    public $id;
    public $lib;
    public $children;
    public $level;
    
    public function __construct($id,$lib,$level)
    {
        $this->id = $id;
        $this->lib = $lib;
        $this->level = $level;
        $this->children = null;
    }
}