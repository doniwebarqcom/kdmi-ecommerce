<?php 
if (!function_exists('get_api_response')) {
   function get_api_response($url = "", $method = "GET", $header = [], $body = [], $body_type = null)
   {


      $session = Session::all();
      if(isset($session['token']))
         $header['authorization'] = 'Bearer '.$session['token'];


      if($method == "GET")
         $body_type = "query";
      elseif ($body_type == null) 
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
          $result_respon  = [
            'code'      => 400,
            'error'     => true,
            'message'   => ['error server'],
            'data'      => null,
            'pagging'   => null,
            'meta'      => null,
         ];

         if(isset($result_respon['meta']->token))
            Session::put('token', $result_respon['meta']->token);
         return (object) $result_respon;
      }

      $result_respon  = [
         'code'      => isset($res->status->code) ? $res->status->code : 200,
         'error'     => isset($res->status->error) ? $res->status->error : false,
         'message'   => isset($res->status->message) ? $res->status->message : null,
         'data'      => isset($res->data) ? $res->data : null,
         'pagging'   => isset($res->paging) ? $res->paging : null,
         'meta'      => isset($res->meta) ? $res->meta : null,
      ];

      if(isset($result_respon['meta']->token))
         Session::put('token', $result_respon['meta']->token);

      return (object) $result_respon;
   }
}

if (!function_exists('resize_cloudinary')) {
   function resize_cloudinary($url, $width = 100, $height = 100)
   {
      $url_cloud = env('URL_CLOUD');
      $tmp_image = str_replace(Env('URL_CLOUD'), "", $url);
      $image = Env('URL_CLOUD').'c_fit,h_'.$height.',w_'.$width.'/'.$tmp_image;
      return $image;
   }
}

if (!function_exists('parsing_url')) {
   function parsing_url($url = null, $add_params = null)
   {
      if($add_params === null)
         return $url;

      if (strpos($url, '?') !== false)
         return $url.'&'.$add_params;
      else
         return $url.'?'.$add_params;
   }
}