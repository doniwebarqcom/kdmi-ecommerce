<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Cookie\CookieJar;
use Cookie;
use Validator;

class ProductController extends CoreController
{
	public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function add(Request $request)
    {
    	$user_data =  $this->getUserProfile();
        return view('koprasi.add_product', ['user_data' => $user_data]);
    }

    public function getDetail($product)
    {
        $user_data =  $this->getUserProfile();
        $product = get_api_response('product/'.$product);
        return view('product.detail')->with(['product' => $product->data, 'user_data' => $user_data]);
    }

    public function getSingle($koprasi, $product)
    {
        $product = get_api_response($koprasi.'/'.$product);
        $user_data =  $this->getUserProfile();
        if($response->code !== 200)
            return redirect('/home');

        return view('product.single', ['product' => $product->data, 'user_data' => $user_data]);
    }

    public function cart()
    {
        $cart = get_api_response('cart');
        $user_data =  $this->getUserProfile();
        return view('product.cart', ['cart' => $cart->data, 'user_data' => $user_data]);
    }

    public function ajax_cart()
    {
        $cart = get_api_response('cart');
        $returnHTML = view('cart.ajax_cart_view')->with('cart', $cart->data)->render();
        return response()->json(array('success' => true, 'html'=>$returnHTML));   
    }

    public function add_cart($product)
    {    
        $response = get_api_response($product.'/add-cart', 'POST');
    }

    public function ajax_update_cart($product, Request $request)
    {
        $body = array(
            'quantity'  => $request->quantity
        );

        $response = get_api_response($product.'/add-cart', 'POST', [], $body);
        return response()->json($response);
    }

    public function destroy_cart(Request $request)
    {
        $delete_cart = get_api_response('cart/'.$request->id, 'DELETE');
        $cart = get_api_response('cart');
        $returnHTML = view('cart.ajax_cart_view')->with('cart', $cart->data)->render();
        return response()->json(array('success' => true, 'html'=>$returnHTML));
    }

    public function store(Request $request)
    {        
        $user_data =  $this->getUserProfile();
        $description = $request->deskripsi;
        $long_description = $request->long_deskripsi ? $request->long_deskripsi : " ";
        $price = str_replace(",", "", $request->harga_barang);
        $price = str_replace(".", "", $price);
        $weight = str_replace(",", "", $request->berat_barang);
        $stock = str_replace(",", "", $request->stok);
        $new = ($request->cond == 'baru' ?  true : false);
        $avaible = ($request->status == 1 ?  true : false);
        $upload = ( count($request->upload) > 0 ? $request->upload : []);
        $abort = ( count($request->abbort) > 0 ? $request->abbort : []);
        $category1 = $request->category;
        $category2 = $request->category2;
        $category3 = $request->category3;
        $minumin = $request->minumin;
        $nama_barang = $request->nama_barang;
        $discont = $request->discont;
        $discont_anggota = $request->discont_koprasi;
        $real_upload = array_diff($upload, $abort);
        $primary_image = reset($real_upload);        
        $category = (isset($category3) ? $category3 : (isset($category2) ?  $category2 : $category1));
        $criteria = $request->criteria ? $request->criteria : [];
        $spesification = $request->spesification ? $request->spesification : [];
        $grosir_dari = $request->jumlah_ke ? $request->jumlah_ke : [];
        $grosir_sampai = $request->jumlah_sampai ? $request->jumlah_sampai : [];
        $grosir_harga = $request->harga_grosir ? $request->harga_grosir : [];

        array_shift($real_upload);
        $result_criteria = [];
        foreach ($criteria as $key => $value) {
            if($value !== "")
                $result_criteria[] = (int) $value;
        }

        foreach ($spesification as $key => $value) {
            if($value !== "")
                $result_spesification[$key] = $value;
        }

        $result_start = [];
        $result_until = [];
        $result_price = [];
        foreach ($grosir_dari as $key => $value) {
            if($value != "" AND $grosir_sampai[$key] != "" AND $grosir_harga[$key] != "")
            {
                $result_start[] = (int) $value;
                $result_until[] = (int) $grosir_sampai[$key] ;
                $result_price[] = (int) str_replace(".", "", $grosir_harga[$key]);
            }
        }
        
        $body = array(
            'category'          => (int) $category,
            'name'              => $nama_barang,
            'description'       => $description,
            'long_description'  => $long_description,
            'price'             => (int) $price,
            'discont'           => (double) $discont,
            'discont_anggota'   => (double) $discont_anggota,
            'primary_image'     => $primary_image,
            'avaible'           => $avaible,
            'weight'            => (int) $weight,
            'stock'             => (int) $stock,
            'new'               => $new,
            'images'            => $real_upload,
            'criterias'         => $result_criteria,
            'spesification'     => $result_spesification,
            'grosir_start'      => $result_start,
            'grosir_until'      => $result_until,
            'grosir_price'      => $result_price,
        );

        $response = get_api_response('product/input', 'POST', [], $body);

        $url = 'koprasi/'.$user_data['shop']->url;
        if($response->code == 200)
            return redirect($url);
        else
            return redirect()->route('product-add')->with('message_error', 'gagal dalam menyimpan silahkan ulangi');
    }

    public function getAjaxCategory()
    {
        $category =  get_api_response('category');
        $cat = [];

        foreach ($category->data as $key => $value) {
            $cat['parent_0'][$key] =  $this->generateData($value);
            if(isset($value->subcategory))
            {
                foreach ($value->subcategory as $subkey1 => $subvalue1) {
                    $cat['parent_'.$value->id][$subkey1] =  $this->generateData($subvalue1);
                    if(isset($subvalue1->subcategory))
                    {
                        foreach ($subvalue1->subcategory as $subkey2 => $subvalue2) {
                            $cat['parent_'.$subvalue1->id][$subkey2] =  $this->generateData($subvalue2);
                        }
                    }
                }
            }
        }

        echo json_encode($cat);
    }

    public function succesStore()
    {
        $user_data =  $this->getUserProfile();
        if( ! (isset($user_data) AND count($user_data) > 1)){
            $cookieJar->queue(cookie('page', 'product-add', 60));
            return redirect()->route('login')->with('message_error', 'Anda harus login terlebih dahulu untuk menambah product');
        }

        if( ! ($user_data['have_shop'] == 1 OR isset($user_data['shop'])))
            return redirect()->route('register-koprasi')->with('message_error', 'Anda belum mempunyai koprasi sendiri');        
               
        return view('koprasi.succes_upload', ['user_data' => $user_data]);
    }

    public function criteria(Request $request)
    {
        $category = $request->get('category') ? $request->get('category') : 1;
        $body = ['category' => $category];
        $category =  get_api_response('criteria/category', 'GET', [], $body);
        return $category->data;
    }

    public function spesification(Request $request)
    {
        $category = $request->get('category') ? $request->get('category') : 1;
        $body = ['category' => $category];
        $category =  get_api_response('spesification/category', 'GET', [], $body);
        return $category->data;
    }

    public function generateData($value)
    {
        $data['id'] = $value->id;
        $data['name'] = $value->name;
        $data['order_num'] = $value->order_num;
        $data['slug'] = $value->slug;
        $data['permalink'] = $value->permalink;
        $data['description'] = $value->description;
        $data['image'] = $value->image;
        return $data;
    }
}