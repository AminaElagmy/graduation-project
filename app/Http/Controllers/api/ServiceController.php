<?php

namespace App\Http\Controllers\api;

use App\Http\Resources\ServiceResource;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function show()
    {
        $products = Product::get();
        $products = ServiceResource::collection($products);

        return response()->json([
            'status' => 200,
            'data'   => $products,
        ], 200);
    }
}
