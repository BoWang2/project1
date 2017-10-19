<?php 
class display extends page
{
	public function get()
	{
		
		$this->html .= htmltage::tablestart();
		$csvfile = file("./upload/".$_GET['filename']);//open file and read it into $csvfile
		foreach($csvfile as $i =>$k)
		{
			$this->html .= htmltage::tablelinestart();
			foreach(explode(",",$k) as $j)
			{
				$this->html .= htmltage::tabledetail($j);
			}
			$this->html .= htmltage::tablelineend();
		}     //data output

		$this->html .= htmltage::tableend();
	}

}



 ?>

