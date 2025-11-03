<?php

namespace App\Services\AI;

use App\Services\AI\Contracts\AICompletionServiceInterface;
use App\Services\AI\Contracts\OpenAIService;
use InvalidArgumentException;

class AIServiceFactory
{
    public function __construct(
        private string $OpenAIKey,
        private string $geminiKey
    ) {}

    public function make(string $model): AICompletionServiceInterface
    {
        return match ($model) {
            'openai' => new OpenAIService($this->OpenAIKey),
            'gemini' => new GeminiService($this->geminiKey),
            'default' => throw new InvalidArgumentException("Unsupported model: {$model}")
        };
    }
}
