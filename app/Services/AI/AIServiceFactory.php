<?php

namespace App\Services\AI;

use App\Services\AI\Contracts\AICompletionServiceInterface;
use App\Services\AI\Contracts\OpenAIService;
use InvalidArgumentException;

class AIServiceFactory
{
    public function __construct(
        private string $openAIKey,
        private string $geminiKey
    ) {}

    public function make(string $model): AICompletionServiceInterface
    {
        return match ($model) {
            'openai' => new OpenAIService($this->openAIKey),
            'gemini' => new GeminiService($this->geminiKey),
            'default' => throw new InvalidArgumentException("Unsupported model: {$model}")
        };
    }
}
