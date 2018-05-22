<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kodami\Models\Mysql\PPulsaOperator;
use Kodami\Models\Mysql\PPulsaTransaksi;
use Kodami\Models\Mysql\PPulsa;
use Kodami\Models\Mysql\Regency;
use Kodami\Models\Mysql\District;
use Kodami\Models\Mysql\Village;
use App\ModelUser;
use Auth;
use Session;
use Hash;
use Illuminate\Support\Facades\Input;

class AjaxController extends Controller
{
    protected $respon;

    /**
     * [__construct description]
     */
    public function __construct()
    {
        /**
         * [$this->respon description]
         * @var [type]
         */
        $this->respon = ['message' => 'error', 'data' => []];
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    public function getPulsaGet(Request $request)
    {
        
        // if($request->ajax())
        // {
            // get extentions 
            $prefix = substr($request->no_telepon, 0, 4);
            $zero   = substr($request->no_telepon, 0, 1);

            if($zero != 0) $prefix = '0'.$prefix;

             // where operator
            $operator   = PPulsaOperator::where('extention', 'LIKE', $prefix.'%')->first();
            $product    = [];

            if(strlen($prefix) == 4)
            {
                if($operator) $product = PPulsa::where('operator', $operator->nama)->where('jenis_product', $request->jenis_product)->orderBy('nominal_pulsa', 'ASC')->get();
            }

            if($operator)
            {
                if(
                    $prefix == '0855' || 
                    $prefix == '0856' || 
                    $prefix == '0857' 
                )
                {
                     $operator->nama = 'Im3';
                }

                if(
                    $prefix == '0858' || 
                    $prefix == '0814' || 
                    $prefix == '0815' || 
                    $prefix == '0816' 
                )
                {
                     $operator->nama = 'Mentari';
                }
            }

            $this->respon = ['message' => 'success', 'operator' => $operator, 'prefix' => $prefix, 'product' => $product];

            return response()->json($this->respon);
        // }else {
        //     dd(444);
        //     return response()->json($this->respon);
        // }
    }
}
