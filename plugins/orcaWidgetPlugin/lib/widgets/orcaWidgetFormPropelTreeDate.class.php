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
class orcaWidgetFormPropelTreeDate extends orcaWidgetFormPropelTree
{
    public function configure($options = array(), $attributes = array())
    {
        $this->addRequiredOption('date_metode');
        
        parent::configure($options, $attributes);
    }

        public function render($name, $value = null, $attributes = array(), $errors = array())
    {

        if (null === $value)
        {
            $value = array();
        }
        $id = $this->generateId($name.'[]', "tree");
        return "<div id='$id'>" . $this->formatChoices($name, $value, $this->getChoices(), $attributes) . "</div>";
    }
    
    protected function formatChoices($name, $value, $choices, $attributes)
    {
       $html = "<ul>";
       
       if(!isset($value['cb']))
       {
           $tmp_value = array('cb'=>array(),'date'=>array());
           foreach ($value as $val)
           {
               $tmp_value['cb'][] = $val;
           }
           
           $value = $tmp_value;
       }
       
       foreach ($choices->children as $choice)/* @var $choice orcaWidgetFormPropelTreeChoice */
       {
           $baseAttributes = array(
            'name'  => $name.'[cb][]',
            'type'  => 'checkbox',
            'value' => self::escapeOnce($choice->id),
            'id'    => $id = $this->generateId($name.'[cb][]', self::escapeOnce($choice->id)),
          );

          if ((is_array($value['cb']) && in_array(strval($choice->id), $value['cb'])) || strval($choice->id) == strval($value['cb']))
          {
            $baseAttributes['checked'] = 'checked';
          }
          $input = $this->renderTag('input', array_merge($baseAttributes, $attributes));
          $label = $this->renderContentTag('label', self::escapeOnce($choice->lib), array('for' => $id));
          
          $wDate = new sfWidgetFormDate(array('format'=>'%day%%month%%year%'));
          
          $date = $choice->date;
          
          if ((is_array($value['date']) && isset($value['date'][$choice->id]))&& isset($baseAttributes['checked']))
          {
            $date =  $value['date'][$choice->id];
          }
          $li = $input.$this->getOption('label_separator').$label.$wDate->render($name.'[date]['.$choice->id.']',$date);
                  
          
           if(!is_null($choice->children))
           {
               $li .= $this->formatChoices($name, $value, $choice, $attributes);
           }
           
           $html.=$this->renderContentTag('li', $li,array("id"=>$choice->id,"rel"=>"niveau_{$choice->level}"));

       }
       $html .= "</ul>";
       
       return $html;
       
    }
    
    public function treeChoices($object,$methodKey,$methodValue,$criteria=null)
  {

    
    $methodDate = $this->getOption('date_metode');
    if (!method_exists($this->getOption('model'), $methodDate))
    {
      throw new RuntimeException(sprintf('Class "%s" must implement a "%s" method to be rendered in a "%s" widget', $this->getOption('date_metode'), $methodDate, __CLASS__));
    }
      $choice = new orcaWidgetFormPropelTreeDateChoice($object->$methodKey(),$object->$methodValue(),$object->getLevel(),$object->$methodDate());
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
  
  
}

class orcaWidgetFormPropelTreeDateChoice
{
    public $id;
    public $lib;
    public $children;
    public $level;
    public $date;


    public function __construct($id,$lib,$level,$date)
    {
        $this->id = $id;
        $this->lib = $lib;
        $this->level = $level;
        $this->date = $date;
        $this->children = null;
    }
}