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
        $form .= '</form> ';
        $this->html .= $form;
	}



public function post() 
    {
        $target_dir = "upload/";
        $target_file = $target_dir.$_FILES["file"]["name"];//make sure relative path of file
		$temp = explode(".",$_FILES["file"]["name"]); 
		$extension = end($temp);

		if(empty($_FILES['file']['error']))//judge whether error of files exist or not
		{
			if($extension != 'csv')
			{
				page::error('the format of file must be csv');
			}

 	 		if (file_exists($target_file))   //juge whether file has existed or not
        	{
          		echo $_FILES["file"]["name"] . " the file has existed. ";
        	}
       		
       		 else
		   	{
 				move_uploaded_file($_FILES["file"]["tmp_name"], $target_file );		
 				//upload file to the upload/filename.csv
 				header('Location:index.php?page=display&filename='. $_FILES["file"]["name"]);
 				//Transfer the user to the display page
			}

		}
		else
		{
			switch($_FILES["file"]["error"])//output the reason why it dispaly error
			{
				case 1:
					$this->html .= stringfunction::printThis("The uploaded file exceeds the upload_max_filesize directive in php.ini");
					break;
				case 2:
					$this->html .= stringfunction::printThis("The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.");
					break;
				case 3:
					 $this->html .= stringfunction::printThis("The uploaded file was only partially uploaded");
					break;
				case 4:
					$this->html .= stringfunction::printThis("No file was uploaded");
					break;
				case 6:
					$this->html .= stringfunction::printThis("Missing a temporary folder. Introduced in PHP 5.0.3.");
					break;
				case 7:
					$this->html .= stringfunction::printThis("Failed to write file to disk. Introduced in PHP 5.1.0.");
					break;
			}




			//echo "There are some mistake :".$_FILES["file"]["error"]."<br>";
		}

	}

}







 ?>