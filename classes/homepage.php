<?php 
class homepage extends page 
{
	public function get()
	{
		$this->html .= stringfunction::printThis("Welcome");
		header('Location:index.php?page=upload');
	}
    
}



 ?>
 