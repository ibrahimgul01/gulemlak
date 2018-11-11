﻿<?php

function permalink($url){
        $url = trim($url);
        $find = array('<b>', '</b>');
        $url = str_replace ($find, '', $url);
        $url = preg_replace('/<(\/{0,1})img(.*?)(\/{0,1})\>/', 'image', $url);
        $find = array(' ', '&amp;amp;amp;quot;', '&amp;amp;amp;amp;', '&amp;amp;amp;', '\r\n', '\n', '/', '\\', '+', '<', '>');
        $url = str_replace ($find, '-', $url);
        $find = array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ë', 'Ê');
        $url = str_replace ($find, 'e', $url);
        $find = array('í', 'ý', 'ì', 'î', 'ï', 'I', 'Ý', 'Í', 'Ì', 'Î', 'Ï','İ','ı');
        $url = str_replace ($find, 'i', $url);
        $find = array('ó', 'ö', 'Ö', 'ò', 'ô', 'Ó', 'Ò', 'Ô');
        $url = str_replace ($find, 'o', $url);
        $find = array('á', 'ä', 'â', 'à', 'â', 'Ä', 'Â', 'Á', 'À', 'Â');
        $url = str_replace ($find, 'a', $url);
        $find = array('ú', 'ü', 'Ü', 'ù', 'û', 'Ú', 'Ù', 'Û');
        $url = str_replace ($find, 'u', $url);
        $find = array('ç', 'Ç');
        $url = str_replace ($find, 'c', $url);
        $find = array('þ', 'Þ','ş','Ş');
        $url = str_replace ($find, 's', $url);
        $find = array('ð', 'Ð','ğ','Ğ');
        $url = str_replace ($find, 'g', $url);
        $find = array('/[^A-Za-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
        $repl = array('', '-', '');
        $url = preg_replace ($find, $repl, $url);
        $url = str_replace ('--', '-', $url);
        $url = strtolower($url);
        
        return $url;
}

function klasorleme($klasor_adi){
	if(!file_exists($klasor_adi))
	{
		$klasor=mkdir($klasor_adi,0777);
		if ($klasor){
			return true;
		}else{
			return false;
		}
	}
}
?>