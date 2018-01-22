<?php 
if (!function_exists('get_api_response')) {
    function get_api_response($url = "", $method = "GET", $header = [], $body = [])
    {
        $client = new \GuzzleHttp\Client();
       	$url = env('URL_API').$url;
       	try {
       		$res = json_decode($client->request($method, $url, $header, $body)->getBody()->getContents());
       	} catch (\GuzzleHttp\Exception\ClientException $exception) {
       		$res = $exception->getResponse()->getBody();
       	}
       	
       	return $res;
    }
}
