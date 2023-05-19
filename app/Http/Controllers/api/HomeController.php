<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HomeResource;
use Illuminate\Http\Request;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::with('products')->get();
        $categories = HomeResource::collection($categories);

        return response()->json([
            'status' => 2001,
            'data'   => $categories,
        ], 200);
    }
}
