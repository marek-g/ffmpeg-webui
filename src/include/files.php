<?php

include("config.php");

function generateFolderOptions($selected)
{
	$result = "";

	global $FOLDERS;

	foreach ($FOLDERS as $key => $value) {
		if ($selected === $value) {
			$result .= "<option selected>$value</option>";
		} else {
			$result .= "<option>$value</option>";
		}
	}

	$result .= "\n";

	return $result;
}

function generateListOfFiles($folder)
{
	$result = "";

	$dir = new DirectoryIterator($folder);
	foreach ($dir as $fileinfo) {
	    if ($fileinfo->isFile()) {
	    	$filename = $fileinfo->getFilename();
	    	$result .= "<option>$filename</option>";
	    }
	}

	$result .= "\n";

	return $result;
}

?>
