<?php

/**
 *
 *
 */

function merchant_sell($api_token, $merchant_token, $amount_CLP){
	$vars=array(
		"token"=>$api_token,
		"merchant_token"=>$merchant_token,
		"amount_CLP"=>$amount_CLP
	);
	return _postYaykuy("/merchant_sell",$vars);
}


function _postYaykuy($uri,$vars){

	$url="https://api.yaykuy.cl".$uri;

	$headers = array(
	 'Accept: application/json',
	 'Content-Type: application/json',
	);
 	$data = json_encode( $vars );
 
	$handle = curl_init();
	curl_setopt($handle, CURLOPT_URL, $url);
	curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
	 
	curl_setopt($handle, CURLOPT_POST, true);
	curl_setopt($handle, CURLOPT_POSTFIELDS, $data);
	 
	$response = curl_exec($handle);
	//$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);
	return json_decode($response,true);
}
?>