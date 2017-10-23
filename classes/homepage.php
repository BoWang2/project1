<?php 
class homepage extends page 
{
	public function get()
	{
		//$this->html .= stringfunction::printThis("Welcome");
		//if(time_nanosleep(3,500000000) === true)
		header('Location:index.php?page=upload');//tansfer user to page of upload

	}
    
}



 ?>
 