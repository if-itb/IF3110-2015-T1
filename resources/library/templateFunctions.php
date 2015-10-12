<?php
	require_once(realpath(dirname(__FILE__) . "/../config.php"));
	
	function renderLayoutWithContentFile($contentFile, $variables=array()){
		$contentFileFullPath = LAYOUT_PATH . "/" . $contentFile;

		/* PASSED VARIABLE HANDLING */
		if (count($variables) > 0){
			foreach ($variables as $key => $value) {
				if (strlen($key) > 0){
					${$key} = $value;
				}
			}
		}

		require_once(LAYOUT_PATH . "/header.php");

		echo "<div id=\"container\">\n";

		if (file_exists($contentFileFullPath)){
			require_once($contentFileFullPath);
		} else{
			require_once(LAYOUT_PATH . "/error.php");
		}

		echo "\t</div>\n";
     

		require_once(LAYOUT_PATH . "/footer.php");
	}
?>