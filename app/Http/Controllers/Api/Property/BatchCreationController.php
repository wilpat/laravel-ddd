<?php

namespace App\Http\Controllers\Api\Property;

use App\Http\Controllers\Controller;
use Domains\Property\Requests\BatchCreationRequest;
use Illuminate\Http\Request;
use Infrastructure\Property\Actions\CreateBatchPropertiesContract;

class BatchCreationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(BatchCreationRequest $request, CreateBatchPropertiesContract $action)
    {
        $attributes = $request->validated();
        $action->handle($attributes);

        return response()->json([
            'message' => 'Properties created successfully',
            'data' => $attributes['properties'],
        ]);
    }
}
