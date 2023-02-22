<?php
/******************************************************
*******************************************************
****************** PHPHUNT SCRIPTS ********************
*************  https://www.phphunt.com   **************
**** This software is distributed free of charge. *****
******** for coding projects: utasar@icloud.com *******
*******************************************************
******************************************************/
function siteURL(){
	$http=isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
	$part=rtrim($_SERVER['SCRIPT_NAME'],basename($_SERVER['SCRIPT_NAME']));
	$part=str_replace('/admin/', '', $part);
	$domain=$_SERVER['SERVER_NAME'];
	return "$http"."$domain"."$part";
}
function uploadimg($identy,$type = 'upload'){
	global $datas;
	if($type == 'update'){
	chmod('../'.$datas[$identy],0777);
	unlink('../'.$datas[$identy]);	
	}
	$image=$_FILES[$identy]['name']; 
	$expimage=explode('.',$image);
	$filetypeOut = array_pop($expimage);
	$filenameOut = implode('.', $expimage);
	$allowedExtensions = array("jpg","png","jpeg","svg");
	if(in_array($filetypeOut,$allowedExtensions)){
	$imagename=$filenameOut.'_'.time().'.'.$filetypeOut;
	$imagepath="../images/".$imagename;
	move_uploaded_file($_FILES[$identy]["tmp_name"],$imagepath);
	$realpath = str_replace('../','',$imagepath);
	return $realpath;
	}
}
?>