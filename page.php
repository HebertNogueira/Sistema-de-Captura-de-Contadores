<?php

	$directory = __dir__;
	$barras = array("/");
	$directory = str_replace($barras, DIRECTORY_SEPARATOR, $directory);
	echo $directory;

?>