<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sellandpurchase; 

use Illuminate\Support\Str;

use \DB;


class SharesController extends Controller
{
    public function SellAddandEdit(Request $r)
    {
        $data = $r->all();

        $stock_code = strtolower(Str::random(10));

        $data['stock_code']= $stock_code ; 

        $sellAndPurchase = Sellandpurchase::create($data);

        return response()->json(['code'=>200,'stock_code'=>$stock_code]);
    }

    public function getListOfShares()
    {
       $records = SellAndPurchase::all();
       $recordsArray = $records->toArray();
       return response()->json($recordsArray);
    }
}
