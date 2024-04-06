<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    // public function index(Request $request)
    public function index()
    {
        return response()->json(['message' => 'API test successful']);
    }
}    