<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\Property;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        return response()->json([
          'message' => 'Properties fetched successfully',
          'data' => $query->handle($request->query())
        ]);
    }
    
}
