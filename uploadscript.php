<?php
if(!isset($_POST['filestart'])){
	die();
}
switch($_POST['filestart']){
	case 0:
	case '0':
	if(move_uploaded_file($_FILES['file']['tmp_name'],$_POST['filedest'].'/'.$_POST['filename'])){
	}
	break;
	default:
	$file = $_FILES['file']['tmp_name'];
	$out = fopen($_POST['filedest'].'/'.$_POST['filename'], "ab");
	if($out){
		$in = fopen($file, "rb"); 
		if ( $in ) {
			while ( $buff = fread( $in, $_POST['size'] ) ) {
				fwrite($out, $buff);
			} 		 
		}
		fclose($in);
		fclose($out);
        } 
	break;
}
