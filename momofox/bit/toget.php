<?php 
function getCode($a){
	return substr($a[0], 9, 3);
}

function url_code($url){
	return getCode(get_headers($url));
}
$url=$_GET['api']; 
if(!$url) {
	echo '{"result":"No api specified!"}';
}else{
	$code=url_code($url);
	echo $code=='200'?file_get_contents($url):'{"result":"'.$code.'"}';  
}
?>