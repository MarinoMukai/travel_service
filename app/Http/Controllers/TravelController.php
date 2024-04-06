<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TravelController extends Controller {
    public function index() {
        
        return view('Travel.index');
    }

    public function store(Request $request) {
        // バリデーション
        $validateMessages = [
            'api.required' => '入力は必須です。',
            'api.max' => '10字以内で入力してください。'
        ];

        $validatedData = $request->validate([
            'api' => 'required|max:10',
        ], $validateMessages);

        $requestData = $request['api'];
        
        // apiをやっていく。
        // $response = Http::get('localhost//', [
        //     'key' => $requestData,
        // ]);

        // $response = Http::get('http://localhost/products');
    }
}
