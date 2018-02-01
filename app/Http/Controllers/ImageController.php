<?php
namespace App\Http\Controllers;

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
}