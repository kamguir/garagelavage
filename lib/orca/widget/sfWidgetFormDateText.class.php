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
class sfWidgetFormDateText extends sfWidgetForm
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
        $this->addOption('config', "{regional: 'fr', dateFormat: 'dd/mm/yy'}");
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
        // si "/", ok
        // si "-", mettre format FR
        $is_format_en = strpos($value, '-') ? true : false;

        if ($value && $is_format_en)
        {
            if (strpos($value, ' '))
                list($value, $hour) = explode(" ", $value);

            list($year, $month, $day) = explode("-", $value);
            $value = $day.'/'.$month.'/'.$year;
        }


// ?date('d/m/Y', strtotime($value)):null
        $html = $this->renderTag('input', array_merge(array('type' => $this->getOption('type'), 'name' => $name, 'value' => $value), $attributes));

        $id = $this->generateId($name);
        $config = $this->getOption('config');
        if($config)
        {
            $html .= <<<EOHTML
<script type="text/javascript">
	$(function() {
          $.datepicker.setDefaults($.datepicker.regional['fr']);
					var d = new Date();
					var end = parseInt(d.getFullYear()) + 10;
            $("#$id").datepicker($config);
            $("#$id").datepicker('option', 'changeYear', 'true');
            $("#$id").datepicker('option', 'yearRange', '2000:'+end);
	});
</script>
EOHTML;
        }
        return $html;
    }

}
