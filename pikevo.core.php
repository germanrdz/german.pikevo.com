<?php


	function Action($option, $param) {		
		switch($option) {
			case "getImagesList":
				getImagesList($param);
				break;
		}		
	}
		
	function getImagesList($folder) {
		
		$fileList = array();
		$count = 0;
		
		if ($handle = opendir($folder))
		{
		    while (false !== ($file = readdir($handle)))
			{
		        if ($file != "." && $file != "..")
				{
		          	// adding file to the filelist array
		  			$fileList[$count] = $file;
					$count++;
		        }
		    }
		    closedir($handle);
		}
		
		// return json object
		echo json_encode($fileList); 		
	}

?>