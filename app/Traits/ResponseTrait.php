<?php
namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

trait ResponseTrait
{
    public function responseJsonSuccess(array $data = []): JsonResponse
    {
        return response()->json(
            array_merge($data, ['success' => true, 'code' => Response::HTTP_OK]),
            Response::HTTP_OK
        );
    }

    public function responseJsonError(array $data = []): JsonResponse
    {
        return response()->json(
            array_merge($data, ['success' => false, 'code' => Response::HTTP_BAD_REQUEST]),
            Response::HTTP_BAD_REQUEST
        );
    }
}
