<?php

class sfWidgetFormBirthDate extends sfWidgetFormDate
{
	/**
	 * @param string $name
	 * @param string $value
	 * @param array $options
	 * @param array $attributes
	 * @return string rendered widget
	 */
	protected function renderDayWidget($name, $value, $options, $attributes)
	{
		$widget =  $this->renderTag('input', array_merge(array('type' => $this->getOption('type'), 'maxlength' => 2, 'class' => 'enlinea', 'name' => $name, 'value' => $value), $attributes));
		$html = '<div class="cont">'.$widget.'<p>DD</p></div>';

		return $html;
	}

	/**
	 * @param string $name
	 * @param string $value
	 * @param array $options
	 * @param array $attributes
	 * @return string rendered widget
	 */
	protected function renderMonthWidget($name, $value, $options, $attributes)
	{
		$widget =  $this->renderTag('input', array_merge(array('type' => $this->getOption('type'), 'maxlength' => 2, 'class' => 'enlinea', 'name' => $name, 'value' => $value), $attributes));
		$html = '<div class="cont">'.$widget.'<p>MM</p></div>';

		return $html;
	}

	/**
	 * @param string $name
	 * @param string $value
	 * @param array $options
	 * @param array $attributes
	 * @return string rendered widget
	 */
	protected function renderYearWidget($name, $value, $options, $attributes)
	{
		$widget =  $this->renderTag('input', array_merge(array('type' => $this->getOption('type'), 'maxlength' => 4, 'class' => 'enlinea anio', 'name' => $name, 'value' => $value), $attributes));
		$html = '<div class="cont">'.$widget.'<p>AAAA</p></div>';

		return $html;
	}
}