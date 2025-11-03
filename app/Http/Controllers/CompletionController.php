<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompletionRequest;
use App\Services\AI\AIServiceFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use Throwable;

class CompletionController extends Controller
{
    public function __construct(private AIServiceFactory $factory)
    {
    }

    public function complete(CompletionRequest $request)
    {
        try {
            $service = $this->factory->make($request->input('model'));
            $response = $service->complete($request->input('prompt'));

            return response()->json(['response' => $response]);
        } catch (Throwable $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
