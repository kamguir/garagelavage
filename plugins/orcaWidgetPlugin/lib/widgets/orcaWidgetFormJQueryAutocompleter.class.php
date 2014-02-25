<?php

/**
 * sfWidgetFormJQueryAutocompleter represents an autocompleter input widget rendered by JQuery.
 *
 * This widget needs JQuery to work.
 *
 * If you use symfony 1.2, it can be done automatically for you.
 *
 * @package    symfony
 * @subpackage widget
 * @author     srathgeber
 */
class orcaWidgetFormJQueryAutocompleter extends sfWidgetFormInput
{
  /**
   * Configures the current widget.
   *
   * Available options:
   *
   *  * url:            The URL to call to get the choices to use (required)
   *  * limit:          The limite result
   *  * minLength       The length min for search
   *  * value_callback: A callback that converts the value before it is displayed
   *
   * @param array $options     An array of options
   * @param array $attributes  An array of default HTML attributes
   *
   * @see sfWidgetForm
   */
  protected function configure($options = array(), $attributes = array())
  {
    $this->addRequiredOption('url');
    $this->addOption('value_callback');
    $this->addOption('limit', '10');
    $this->addOption('minLength', '2');

    // this is required as it can be used as a renderer class for sfWidgetFormChoice
    $this->addOption('choices');

    parent::configure($options, $attributes);
  }

  /**
   * @param  string $name        The element name
   * @param  string $value       The date displayed in this widget
   * @param  array  $attributes  An array of HTML attributes to be merged with the default HTML attributes
   * @param  array  $errors      An array of errors for the field
   *
   * @return string An HTML tag string
   *
   * @see sfWidgetForm
   */
  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    $visibleValue = $this->getOption('value_callback') ? call_user_func($this->getOption('value_callback'), $value) : $value;

    return $this->renderTag('input', array('type' => 'hidden', 'name' => $name, 'value' => $value)).
           parent::render('autocomplete_'.$name, $visibleValue, $attributes, $errors).
           sprintf(<<<EOF
<script type="text/javascript">
  jQuery(document).ready(function() {
    jQuery("#%s")
    .autocomplete({
        source: function( request, response ) {
				$.ajax({
					url: '%s',
					data: {
						limit: %s,
						q : request.term
					},
                    dataType: "json",
					success: function( data ) {
                        response(data);
					}
				});
			},
		minLength: %s,
        select: function( event, ui ) {
                   jQuery("#%s").val(ui.item.id);
        }
    })});
</script>
EOF
      ,
      $this->generateId('autocomplete_'.$name),
      $this->getOption('url'),
      $this->getOption('limit'),
      $this->getOption('minLength'),
      $this->generateId($name)
    );
  }

}
