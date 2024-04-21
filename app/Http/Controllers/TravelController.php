<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GeminiAPI\Client;
use GeminiAPI\Resources\Parts\TextPart;

class TravelController extends Controller
{
    /**
     * 自由入力の入力画面を表示する
     */
    public function freeinputindex()
    {
        return view('Travel.freeinputindex');
    }

    /**
     * 自由入力の結果を表示する
     */
    public function freeinputstore(Request $request)
    {
        // バリデーション
        $validateMessages = [
            'api.required' => '入力は必須です。',
            'api.max' => '100字以内で入力してください。'
        ];

        $validatedData = $request->validate([
            'api' => 'required|max:100',
        ], $validateMessages);

        $requestData = '旅行の計画を立ててください。もし、旅行以外のことを聞かれているなら、「申し訳ございません。わかりません」と答えてください。' . $request['api'];
        $response = $this->connectGeminiapi($requestData);
        return back()->with('success', $response);
    }

    /**
     * 選択式の入力画面を表示する
     */
    public function choiceinputindex()
    {
        $choiceList = [
            '都道府県',
            '交通手段',
            '金銭',
            // '季節',
            // '目的',
        ];

        $prefectureList = [
            '東京都',
            '神奈川県',
        ];

        $transportationList = [
            '電車',
            'バス',
            '車',
        ];

        return view('Travel.choiceinputindex', compact('choiceList', 'prefectureList', 'transportationList'));
    }

    /**
     * 選択式の入力結果を表示する
     */
    public function choiceinputstore(Request $request)
    {
        // バリデーション
        // $validateMessages = [
        //     'api.required' => '入力は必須です。',
        //     'api.max' => '100字以内で入力してください。'
        // ];

        // $validatedData = $request->validate([
        //     'api' => 'required|max:100',
        // ], $validateMessages);

        $requestData = '下記の条件に合わせて旅行プランを作成してください。
        都道府県：' . $request['prefecture']
            . '交通手段：' . $request['transportation']
            . '金銭：' . $request['money']
            // . '季節：' . $request['season']
            // . '目的：' . $request['purpose'] 
            // . 'パターン:' . $request['pattern']
            . '。';

        // var_dump($requestData);
        // exit();
        $response = $this->connectGeminiapi($requestData);
        return back()->with('success', $response);
    }

    /**
     * チャット入力画面を表示する
     */
    public function chatinputindex()
    {
        return view('Travel.chatinputindex');
    }

    /**
     * チャット入力の結果を表示する
     */
    public function chatinputstore(Request $request)
    {
        // バリデーション
        $validateMessages = [
            'api.required' => '入力は必須です。',
            'api.max' => '100字以内で入力してください。'
        ];

        $validatedData = $request->validate([
            'api' => 'required|max:100',
        ], $validateMessages);

        $requestData = $request['api'];
        $response = $this->connectGeminiapi($requestData);
        return back()->with('success', $response);
    }

    /**
     * geminiapiに接続する(restapiで書きたい)
     */
    private function connectGeminiapi($requestData)
    {
        $geminiApiKey = getenv('GEMINI_API_KEY');
        $client = new Client($geminiApiKey);

        $response = $client->geminiPro()->generateContent(
            new TextPart($requestData),
        );
        // logを仕込みたい
        return $response->text();
    }
}
