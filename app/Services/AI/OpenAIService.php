<?php

namespace App\Services\AI\Contracts;

use App\Services\AI\Contracts\AICompletionServiceInterface;
use Exception;
use Illuminate\Support\Facades\Http;
class OpenAIService implements AICompletionServiceInterface
{
    public function __construct(private string $apiKey)
    {
    }
    public function complete(string $prompt): string
    {
        $response = Http::withToken($this->apiKey)
            ->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-5o',
                'messages' => [
                    ['role' => 'user', 'content' => $prompt]
                ]
            ]);

        if ($response->failed()) {
            throw new Exception('OpenAI API request failed');
        }

        return $response;
    }
}
