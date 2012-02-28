<?php
class sample_object{

public function factorial($x)
	{
	if($x>10)
		return "Result too large";
	elseif($x>1)
		return $x*$this->factorial($x-1);
	elseif($x==1)
		return 1;
	else
		throw new Exception("test");
	}

function function_with_branches($x)
{
	if($x==1)
		echo "one";
	elseif($x==2)
		switch(1){
			case 1:
				switch($x) {
					case 1:
						echo 1;
						break;
					case 2:
						echo 2;
						foreach(array(1,2,3) as $v) echo 56;
						while($v < 10) $v++;
						echo $v;
						if(4) {break 1;
							if(5)
								echo 45;
							if(5)
								echo 45;
						}
						while(0) {
							while(0) 
								if(5) {
									continue;
									if(7){
										echo 7;
									}
									else echo 9;
								}
							}
						echo $v+2;
						do echo 45,$v++; while(0);
						if(2) echo 12;
						break 2;
					default:
						echo 8;
						break;
					case 0?3:2?5:3:
							 echo 3;
							 break;
				}
		}
	else echo 64;
	echo 344;
}	
function function_with_branches_2($x)
	{
		if($x==1)
			echo "one";
		elseif($x==2)
			switch($x) {
				case 1:
					echo 1;
					break;
				case 2:
					echo 2;
					foreach(array(1,2,3) as $v) echo 56;
					while($v < 10) $v++;
					echo $v;
					if(4) break;
					echo $v+2;
					if(2) echo 12;
				default:
					echo 8;
					break;

				}
		else echo 64;
	}	
}

