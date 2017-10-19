<?php 
class htmltage
{
	static public function horizontalrule()
	{
		return '<hr>';
	}
	
	static public function headingone($text)
	{
		return '<h1>'.$text.'</h1>';
	}

	static public function htmlhead()
	{
		return '<html>';
	}

	static public function htmlend()
	{
		return '</html>';
	}

	static public function htmlbody()
	{
		return '<body>';
	}

	static public function htmlbodyend()
	{
		return '</body>';
	}


	static public function tabledetail($input)
	{
		return '<td>'.$input.'</td>';
	}

	static public function tablelinestart()
	{
		return '<tr>';
	}

	static public function tablelineend()
	{
		return '</tr>';
	}

	static public function tablestart()
	{
		return "<table style = 'width:100%'>";
	}

	static public function tableend()
	{
		return '</table>';
	}
}



 ?>