<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Commision;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

use App\Classes\CommisionClass;

class CommisionController extends Controller
{
    public function calculate(Request $request)
    {
        $productAndQuantity = json_decode($request->input('productAndQuantity'));
        $allProductArray = array();

        foreach($productAndQuantity[0]->product as $key => $value) {
            $productName = $value->name;
            $productQuantity = $value->quantity;

            $commision = new CommisionClass($productName, $productQuantity);
            $returnComission = $commision->calculateComission();
            array_push($allProductArray, $returnComission);
        }

        return response()->json($allProductArray, 200);
  }
}
