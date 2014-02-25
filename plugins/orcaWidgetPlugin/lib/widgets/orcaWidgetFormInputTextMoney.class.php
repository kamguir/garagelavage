<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of orcaWidgetFormInputText
 *
 * @author srathgeber
 */
class orcaWidgetFormInputTextMoney extends sfWidgetFormInputText
{

    protected function configure($options = array(), $attributes = array())
    {
        $this->addOption('money', '€');
        $this->addOption('digits', 0);

        parent::configure($options, $attributes);
    }

    /**
     * @param  string $name        The element name
     * @param  string $value       The value displayed in this widget
     * @param  array  $attributes  An array of HTML attributes to be merged with the default HTML attributes
     * @param  array  $errors      An array of errors for the field
     *
     * @return string An HTML tag string
     *
     * @see sfWidgetForm
     */
    public function render($name, $value = null, $attributes = array(), $errors = array())
    {
        if (is_numeric($value)) {
          $value = number_format($value,$this->getOption('digits'),".","");
        }
        return $this->renderTag('input', array_merge(array('type' => $this->getOption('type'), 'name' => $name, 'value' => $value), $attributes)) . ' <span class="orcaMoney">' . $this->getOption('money') . '</span>';
    }

}