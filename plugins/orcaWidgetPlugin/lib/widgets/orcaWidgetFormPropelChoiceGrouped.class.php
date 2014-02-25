<?php

/**
 * A widget of grouped choices.
 * 
 * @package     sfFormExtraPlugin
 * @subpackage  widget
 * @author      Kris Wallsmith <kris.wallsmith@symfony-project.com>
 * @version     SVN: $Id: sfWidgetFormPropelChoiceGrouped.class.php 16067 2009-03-06 16:57:46Z Kris.Wallsmith $
 */
class orcaWidgetFormPropelChoiceGrouped extends sfWidgetFormPropelChoiceGrouped
{

    public function render($name, $value = null, $attributes = array(), $errors = array())
    {                
        return '<div id="' . $this->generateId($name) . '">' . parent::render($name, $value, $attributes, $errors) . '</div>';
    }

}
