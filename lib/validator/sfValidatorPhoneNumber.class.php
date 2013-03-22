<?php

class sfValidatorPhoneNumber extends sfValidatorString
{
	protected function doClean($value)
	{
		if(is_array($value))
		{
			$areaCode = $value['area_code'];
			$lineNumber = $value['line_number'];
			
			if(trim($areaCode) == '' && trim($lineNumber) == '')
			{
				$clean = '';
			}else
			{
				if(strlen(trim($areaCode)) > 4 || strlen(trim($lineNumber)) > 8)
				{
					throw new sfValidatorError($this, 'invalid', array('value' => $value, 'invalid' => $this->getOption('invalid')));
				}else 
				{
					$clean = $value['area_code'].'-'.$value['line_number'];
				}
			}
		}else
		{
			$clean = $value;
		}
		
		return $clean;
	}
}