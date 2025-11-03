<?php

namespace App\Services\AI;

use App\Services\AI\Contracts\AICompletionServiceInterface;
use Exception;
use Illuminate\Support\Facades\Http;

class GeminiService implements AICompletionServiceInterface
{
    public function __construct(private string $apiKey)
    {
    }

    public function complete(string $prompt): string
    {
        $response = Http::post(
            "https://generativelanguage.googleapis.com/v1/models/gemini-pro:generateContent?key={$this->apiKey}",
            [
                'contents' => [
                    ['parts' => [['text' => $prompt]]]
                ]
            ]
        );

        if ($response->failed()) {
            throw new Exception('Gemini API request failed');
        }

        return $response;
    }
}
