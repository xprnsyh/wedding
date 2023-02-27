<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\District;
use App\Models\Product;
use App\Province;

class ApiController extends Controller
{
    //
    public function getCity(Request $request)
    {
        //QUERY UNTUK MENGAMBIL DATA KOTA / KABUPATEN BERDASARKAN PROVINCE_ID
        $province_id = $request->get('province_id');
        $cities = City::where('province_id', $province_id)
        ->select([
            'id', 'province_id',
            'name', 'type', 
            'postal_code'
        ])
        ->get();
        //KEMBALIKAN DATANYA DALAM BENTUK JSON
        return response()->json(['status' => 'success', 'data' => $cities]);
    }

    public function getDistrict(Request $request)
    {
        //QUERY UNTUK MENGAMBIL DATA KECAMATAN BERDASARKAN CITY_ID
        $city_id = $request->get('city_id');
        $districts = District::where('city_id', $city_id)
        ->select([
            'id','province_id',
            'city_id', 'name'
        ])
        ->get();
        //KEMUDIAN KEMBALIKAN DATANYA DALAM BENTUK JSON
        return response()->json(['status' => 'success', 'data' => $districts]);
    }

    public function getProvince()
    {
        $provinces = Province::orderBy('name', 'ASC')
        ->select([
            'id', 'name',
        ])
        ->with(array('city' => function($query) {
            $query->select('id','province_id','name', 'type', 'postal_code');
        }))
        ->with(array('district' => function($query) {
            $query->select('id','province_id', 'city_id', 'name');
        }))
        ->get();

        return response()->json([
            'status' => 'success',
            'data' => $provinces
        ]);
    }

    public function getProductPrice(Request $request)
    {
        $product = Product::find($request->product_id);

        return response()->json([
            'status' => 'success',
            'data' => $product->price
        ]);
    }

}
