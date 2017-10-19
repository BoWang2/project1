<?php 
class upload extends page
{
	public function get()
	{
		$form = '<form action="index.php?page=upload" method="post" enctype = "multipart/form-data">';
        $form .= '<label for = "file">filename:</label>';
        $form .= '<input type="file" name="file" id="file" >';
        $form .= '<br>';
        $form .= '<input type="submit" name="submit" id="file"><br>';
       // $form .= '<input type="submit" name="submit" value="Submit">';
        $form .= '</form> ';
        //$this->html .= 'homepage';
        $this->html .= $form;
	}



public function post() 
    {
        $target_dir = "upload/";
        $target_file = $target_dir.$_FILES["file"]["name"];
		$temp = explode(".",$_FILES["file"]["name"]);
		$extension = end($temp);

		if(empty($_FILES['file']['error']))
		{
			if($extension != 'csv')
			{
				page::error('the format of file must be csv');
			}

 	 		if (file_exists($target_file))
        	{
          		echo $_FILES["file"]["name"] . " the file has existed. ";
        	}
       		
       		 else
		   	{
 				move_uploaded_file($_FILES["file"]["tmp_name"], $target_file );		//Transfer the user to the tabledisplay page
 				header('Location:index.php?page=display&filename='. $_FILES["file"]["name"]);
 			
			}

		}
		else
		{
			echo "There are some mistake :".$_FILES["file"]["error"]."<br>";
		}

	}

}







 ?>