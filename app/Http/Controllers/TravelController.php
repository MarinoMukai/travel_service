<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class TravelController extends Controller 
{
    public function index()
    {
        return view('Travel.index');
    }

    //ログイン用フォーム
    public function store(Request $request)
    {
        // バリデーション
        $customMessages = [
            'inputName1.required' => '入力は必須です。',
            'inputName1.string' => 'ここの空欄には数字以外を入れないでください。',
            'inputName2.required' => '入力は必須です。',
            'inputName2.alpha_num' => 'ここの空欄には数字以外を入れないでください。',
            'inputName2.min' => 'パスワードは5文字以上で入力してください。',
        ];
    
        $validatedData = $request->validate([
            'inputName1' => 'required|string',
            'inputName2' => 'required|alpha_num|min:5'
        ], $customMessages);
    
        $inputValue1 = $request->input('inputName1');
        $inputValue2 = $request->input('inputName2');
    
        return redirect('/travel/index')->with('success', 'ログインに成功しました');
    }
}

