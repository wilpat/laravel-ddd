<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\Property;

use App\Http\Controllers\Controller;
use Domains\Property\Resources\PropertyResource;
use Domains\Property\Requests\PropertyCreationRequest;
use Infrastructure\Property\Actions\CreatePropertyContract;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(PropertyCreationRequest $request, CreatePropertyContract $action)
    {
        $attributes = $request->validated();

        return response()->json([
          'message' => 'Property created successfully',
          'data' =>  new PropertyResource($action->handle($attributes))
        ]);
    }
}
