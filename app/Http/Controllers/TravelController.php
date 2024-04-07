<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GeminiAPI\Client;
use GeminiAPI\Resources\Parts\TextPart;
class TravelController extends Controller {
    public function index() {
        
        return view('Travel.index');
    }

    public function store(Request $request) {
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
    private function connectGeminiapi($requestData) {
        $gemoiniApiKey = getenv('GEMINI_API_KEY');
        $client = new Client($gemoiniApiKey);

        $response = $client->geminiPro()->generateContent(
            new TextPart($requestData),
        );
        // logを仕込みたい
        return $response->text();
    }
}
