<?php
class sampleclass
{

public function factorial($x)
	{
	if($x>10)
		return "Result too large";
	elseif($x>1)
		return $x*$this->factorial($x-1);
	else
		return 1;
	}

}
