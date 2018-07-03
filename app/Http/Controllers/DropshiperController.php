<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DropshiperController extends CoreController
{
	public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function register()
    {
        $user_data =  $this->getUserProfile();
        $province =  get_api_response('place/province');
        $ocupation =  get_api_response('ocupation');
        $sellingEnv =  get_api_response('selling/enviroment');
        $breadcrumb = array(
            array("name" => 'Home', 'url' => 'home'),
            array("name" => 'Register Dropshiper', 'url' => 'dropshiper/register'),
        );

        return view('dropshiper.register', ['province' => $province->data, 'user_data' => $user_data, 'sellingEnv' => $sellingEnv->data, 'ocupation' => $ocupation->data, 'breadcrumb' => $breadcrumb]);
    }

    public function store(Request $request)
    {
        $data_post = [
            "physical_store"    =>  (int) $request->physical_store,
            "ocupation"         =>  $request->ocupation,
            "selling_env"       =>  $request->selling_env,
            "place_selling"     =>  $request->place_selling,
            "province"          =>  (int) $request->province,
            "regency"           =>  (int) $request->regency,
            "district"          =>  (int) $request->district,
            "village"           =>  (int) $request->village,
            "postal_code"       =>  (int) $request->postal_code,
            "image"             =>  $request->upload
        ];

        $response = get_api_response('register/dropshiper', 'POST', [], $data_post);
        if($response->code != 200)
            return redirect()->route('dropshiper-register')->with('error-message', $response->message);
        
        return redirect()->route('succes-register-dropshier')->with('data', $response->data);
    }

    public function succes()
    {
        return view('dropshiper.succes');
    }
}