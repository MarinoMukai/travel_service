<?php
// 見本みたいなものです。localhost/sample/index


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class SampleController extends Controller {
    public function index() {
        $number = '12345';
        return view('Sample/index', ['number' => $number]);
        // よく使われるデバッグ方法：変数の中身を見れます。
        // var_dump($number);
        // var_dump('コントローラーがつながったよ');
        // exit();
    }

    /**
     * フォーム受け取り
     * ほぼchatGPTです。
     */
    public function store(Request $request)
    {
        // バリデーションはこっちで統一したい。
        $customMessages = [
            'inputName1.required' => '入力は必須です。',
            'inputName1.integer' => 'ここの空欄には数字以外を入れないでください。',
            'inputName2.required' => '入力は必須です。',
            'inputName2.integer' => 'ここの空欄には数字以外を入れないでください。',
        ];

        $validatedData = $request->validate([
            'inputName1' => 'required|integer',
            'inputName2' => 'required|integer'
        ], $customMessages);

        $inputValue1 = $request->input('inputName1');
        $inputValue2 = $request->input('inputName2');
        $sumInputValue = $inputValue1 + $inputValue2;

        return back()->with('success', $sumInputValue);
    }

    public function api(Request $request) {

        $rules = [
            'api' => 'required', // 例: 'api' パラメーターが必須で、数値であることを要求
        ];
    
        $messages = [
            'api.required' => 'APIパラメーターが必要です。',
        ];
    
        // バリデーターの作成
        $validator = Validator::make($request->all(), $rules, $messages);
    
        // バリデーションの実行
        if ($validator->fails()) {
            // バリデーションに失敗した場合の処理
            return redirect()->back()->withErrors($validator)->withInput();
        }
            $requestData = $request->input('api');
            if (!empty($requestData)) {
                // ここでAPIにつなげる。
                // シングルアクションコントローラーでつなげたい。
                var_dump('受け取った値::' . $requestData . 'これからAPI調べます・');
                exit();
            }
    }
}