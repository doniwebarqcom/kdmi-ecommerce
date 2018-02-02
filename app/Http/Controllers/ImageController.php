<?php
namespace App\Http\Controllers;

use JD\Cloudder\Facades\Cloudder;
use Illuminate\Http\Request;

class ImageController extends CoreController
{
	public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function upload()
    {
		$body = array(
			array(
				'name'     => 'image',
		        'contents' => fopen($_FILES['gambar']['tmp_name'], 'r')
			)
		);

		$result = get_api_response('image/upload', 'POST', [], $body, 'multipart');
		echo json_encode($result);
    }

    public function mandiri(Request $request)
    {
    	$result_upload = Cloudder::upload($request->file('image')->getPathName());
    	$result = $result_upload->getResult();

    	echo json_encode($result['secure_url']);
    }
}