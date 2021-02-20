<?php
namespace GChat\classe\xml;

		$xml_file_name = "options.xml";
			
		$file = fopen($xml_file_name, "w") or die("wtf");
		$xml = '<?xml version="1.0" encoding="UTF-8"?>';
		fwrite($file,$xml);
		$xml = '<theme>'.$_POST["Theme"].'</theme>';
		fwrite($file,$xml);
		fclose($file);
		
header('Location: ../../membre.php');
exit();
?>