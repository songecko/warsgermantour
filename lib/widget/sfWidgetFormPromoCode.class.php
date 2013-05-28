<?php

class sfWidgetFormPromoCode extends sfWidgetFormInputText
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
			$codeParts = array_values($value);
		}else
		{
			$codeParts = explode(' ', $value);
		}
		$datePart = isset($codeParts[0])?$codeParts[0]:'';
		$hourPart  = isset($codeParts[1])?$codeParts[1]:'';
		$minutesPart  = isset($codeParts[2])?$codeParts[2]:'';
		$lotePart  = isset($codeParts[3])?$codeParts[3]:'';
		
		$dateTag = $this->renderTag('input', array_merge(array('type' => $this->getOption('type'), 'size' => 4, 'maxlength' => 6, 'name' => $name.'[date]', 'value' => $datePart), $attributes));
		$hourTag = $this->renderTag('input', array_merge(array('type' => $this->getOption('type'), 'size' => 1, 'maxlength' => 2, 'name' => $name.'[hour]', 'value' => $hourPart), $attributes));
		$minutesTag = $this->renderTag('input', array_merge(array('type' => $this->getOption('type'), 'size' => 2, 'maxlength' => 2, 'name' => $name.'[minutes]', 'value' => $minutesPart), $attributes));
		$loteTag = $this->renderTag('input', array_merge(array('type' => $this->getOption('type'), 'size' => 1, 'maxlength' => 2, 'name' => $name.'[lote]', 'value' => $lotePart), $attributes));
		
		$html = '<label>'.$dateTag.'</label><label>'.$hourTag.':'.$minutesTag.'</label><label>'.$loteTag.'</label>';
		
		return $html;						
	}
}