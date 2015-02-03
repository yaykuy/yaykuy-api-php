<?php

/**
 *
 *
 */

function merchant_sell($api_token, $merchant_token, $amount_CLP, $callback=null, $referencia=null){
	$vars=array(
		"token"=>$api_token,
		"merchant_token"=>$merchant_token,
		"amount_CLP"=>$amount_CLP
	);
	if($callback!=null){
		$vars["callback"]=$callback;
	}
	if($referencia!=null){
		$vars["referencia"]=$referencia;
	}
	return _postYaykuy("/merchant_sell",$vars);
}


function _postYaykuy($uri,$vars){

	$url="https://api.yaykuy.cl".$uri;
	//$url="http://localhost:8080".$uri;

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