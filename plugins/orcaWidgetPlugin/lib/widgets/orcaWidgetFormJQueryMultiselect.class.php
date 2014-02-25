<?php

/**
 * sfWidgetFormInput represents an JQueryMultiselect input tag.
 *
 * @subpackage widget
 * @url http://www.erichynds.com/examples/jquery-ui-multiselect-widget/demos
 * @author     Stephane Rathgeber
 */
class orcaWidgetFormJQueryMultiselect extends sfWidgetForm
{

    public function __construct($options = array(), $attributes = array())
    {
        if(!isset($options['choice_widget']))
        {
            $options['choice_widget']= new sfWidgetFormPropelChoice(array_merge(array('multiple'=>true),
                                                                       $this->cleanOptionSelect($options)));
        }
        parent::__construct($this->cleanOption($options), $attributes);
    }

    protected function configure($options = array(), $attributes = array())
    {
        $this->addOption('config', "{}");//config from multiselect
        $this->addOption('config_filter', "{}");//config from filter
        $this->addOption('filter', false);
        $this->addOption('choice_widget');
        
        parent::configure($this->cleanOption($options), $attributes);
    }

    private function cleanOption($options)
    {
        $opt_select = $this->cleanOptionSelect($options);
        $opt = array_diff_assoc($options, $opt_select);
        return $opt;
    }
    
    private function cleanOptionSelect($options)
    {
        unset($options['config']);
        unset($options['config_filter']);
        unset($options['filter']);
        unset($options['choice_widget']);
        return $options;
    }

    public function setWidgetOption($name,$value)
    {
        $this->getOption('choice_widget')->setOption($name, $value);
        return $this;
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
        $html = $this->getOption('choice_widget')->render($name, $value, $attributes, $errors);

        $id = $this->generateId($name);
        $config = $this->getOption('config');
        $config_filer = $this->getOption('config_filter');
        $html .= "<script type=\"text/javascript\">             
             $(\"#$id\").multiselect($config)";
        if($this->getOption('filter'))
        {
            $html .= ".multiselectfilter($config_filer)";
        }

        $html .= ";\n</script>";

       
        return $html;
    }

}
