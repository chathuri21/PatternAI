<?php

namespace App\Services\AI\Contracts;

interface AICompletionServiceInterface
{
    public function complete(string $prompt): string;
}
