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
			echo "There are some mistake :".$_FILES["file"]["error"]."<br>";
		}

	}

}







 ?>