<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Property;

use App\Http\Controllers\Controller;
use Domains\Property\Resources\PropertyResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Infrastructure\Property\Queries\FetchPropertiesContract;

class FetchController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request, FetchPropertiesContract $query)
    {
        try {
            Log::info("Adding branch b");
            return response()->json([
                'message' => 'Properties fetched successfully',
                'data' => PropertyResource::collection($query->handle($request->query()))->response()->getData(true),
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'We could not process this request. Please try again later.',
            ], 500);
        }
    }
}
