<?php

class sfValidatorPromoCode extends sfValidatorString
{
	public function clean($value)
	{
		return parent::clean($this->doClean($value));
	}
	
	protected function doClean($value)
	{
		if(is_array($value))
		{
			$date = $value['date'];
			$hour = $value['hour'];
			$minutes = $value['minutes'];
			$lote = $value['lote'];
			
			if(trim($date) == '' && trim($hour) == '' && trim($minutes) == '' && trim($lote) == '')
			{
				$clean = '';
			}else
			{
				if(!$this->isValidDate($date) ||
					strlen(trim($hour)) != 2 ||
					strlen(trim($minutes)) != 2 ||
					strlen(trim($lote)) != 2)
				{
					throw new sfValidatorError($this, 'invalid', array('value' => $value, 'invalid' => $this->getOption('invalid')));
				}else 
				{
					$clean = $date.' '.$hour.' '.$minutes.' '.$lote;
				}
			}
		}else
		{
			$clean = $value;
		}
		
		return $clean;
	}
	
	private function isValidDate($date)
	{
		//TODO do the validate
		return strlen(trim($date)) == 6;
	}
}