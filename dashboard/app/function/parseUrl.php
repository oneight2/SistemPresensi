<?php 

function parseUrl($url){
	if(isset($url)){
		$url = rtrim($url,'/');
		$url = filter_var($url,FILTER_SANITIZE_URL);
		$url = explode('/', $url);
		return $url;
	}
}