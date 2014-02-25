<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * sfWidgetFormInput represents an HTML input tag.
 *
 * @package    symfony
 * @subpackage widget
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfWidgetFormInput.class.php 22081 2009-09-16 13:28:26Z fabien $
 */
class orcaWidgetFormDateText extends sfWidgetForm
{

    /**
     * Constructor.
     *
     * Available options:
     *
     *  * config: A JavaScript array that configures the JQuery date widget
     *
     * @param array $options     An array of options
     * @param array $attributes  An array of default HTML attributes
     *
     * @see sfWidgetForm
     */
    protected function configure($options = array(), $attributes = array())
    {
        $culture = sfPropel::getDefaultCulture();
        
        $this->addOption('config', "$.datepicker.regional[ '$culture' ]");
        
        $this->addOption('format', 'd/m/Y');
        
        $this->addOption('yearRange', "1900:time.getYear()");

        $this->addOption('type', 'text');
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
        if (strstr($value, '-') !== false) {
          $value = date($this->getOption('format'), strtotime($value));
        }
        $html = $this->renderTag('input', array_merge(array('type' => $this->getOption('type'), 'name' => $name, 'value' => $value), $attributes));

        $id = $this->generateId($name);
        $config = $this->getOption('config');
        $yearRange = $this->getOption('yearRange');
        if($config)
        {
            $html .= <<<EOHTML
<script type="text/javascript">
	$(function() {
            var time = new Date();
            $("#$id").datepicker($config);
            $("#$id").datepicker('option', 'changeYear', 'true');
            $("#$id").datepicker('option', 'yearRange', '{$yearRange}');
    });
</script>
EOHTML;
        }
        return $html;
    }

}
