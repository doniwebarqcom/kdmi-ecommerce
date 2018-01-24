<?php 
if (!function_exists('get_api_response')) {
    function get_api_response($url = "", $method = "GET", $header = [], $body = [], $body_type = null)
    {
        if($body_type == null)
          $body_type = "form_params";

        $data_send = [
          'headers'   => $header,
          $body_type  => $body
        ];

        $client = new \GuzzleHttp\Client();
       	$url = env('URL_API').$url;
       	
        try {
          try {
            $res = json_decode($client->request($method, $url, $data_send)->getBody()->getContents());
          } catch (\GuzzleHttp\Exception\ClientException $exception) {
            $res = json_decode($exception->getResponse()->getBody()->getContents());
          }  
        } catch (Exception $e) {

        }

        $result_respon  = [
          'code'    => isset($res->status->code) ? $res->status->code : 200,
          'error'   => isset($res->status->error) ? $res->status->error : false,
          'message' => isset($res->status->message) ? $res->status->message : null,
          'data'    => isset($res->data) ? $res->data : null,
          'meta'    => isset($res->meta) ? $res->meta : null,
        ];
        
       	return (object) $result_respon;
    }
}
