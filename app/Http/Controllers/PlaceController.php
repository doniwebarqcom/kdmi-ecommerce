<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlaceController extends CoreController
{
	public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function pos()
    {
        $body = [
            'query'      => $this->request->get('q')
        ];

    	$pos =  get_api_response('place/postal', 'GET', [], $body);
        echo json_encode($pos->data);
    }

    public function regency()
    {
        $body = [
            'query'      => $this->request->get('q')
        ];

        $regency =  get_api_response('place/regency', 'GET', [], $body);
        echo json_encode($regency->data);
    }

    
}