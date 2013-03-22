<?php

class sfWidgetFormPhoneNumber extends sfWidgetFormInputText
{
	/**
	 * Renders the widget.
	 *
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
		if (is_array($value))
		{
			$phoneParts = array_values($value);
		}else
		{
			$phoneParts = explode('-', $value);
		}
		$areaCode = isset($phoneParts[0])?$phoneParts[0]:'';
		$lineNumber  = isset($phoneParts[1])?$phoneParts[1]:'';
		
		$areaCodeTag = $this->renderTag('input', array_merge(array('type' => $this->getOption('type'), 'maxlength' => 4, 'class' => 'enlinea', 'name' => $name.'[area_code]', 'value' => $areaCode), $attributes));
		$lineNumberTag = $this->renderTag('input', array_merge(array('type' => $this->getOption('type'), 'maxlength' => 8, 'class' => 'enlinea lineNumber', 'name' => $name.'[line_number]', 'value' => $lineNumber), $attributes));
		
		$html = $areaCodeTag.'-';
		$html .= $lineNumberTag;
		
		return $html;						
	}
}