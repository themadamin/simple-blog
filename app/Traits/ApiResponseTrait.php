<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\LengthAwarePaginator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Throwable;

trait ApiResponseTrait
{
    protected function successResponse(string $message = 'ok'): JsonResponse
    {
        return response()->json([
            'data' => [
                'success' => true,
                'message' => $message
            ],
        ], Response::HTTP_OK);
    }

    protected function resultResponse($response): JsonResource|JsonResponse
    {
        return response()->json(['data' => $response], Response::HTTP_OK);
    }

    protected function paginationResponse(LengthAwarePaginator $response): JsonResponse {
        $data = [
            'paginator' => [
                'current_page' => $response->currentPage(),
                'last_page' => $response->lastPage(),
                'per_page' => $response->perPage(),
                'total' => $response->total(),
            ],
            'user_type' => $user->user_type ?? null,
            'data' => $response->items(),
        ];

        return response()->json($data, ResponseAlias::HTTP_OK);
    }

    protected function errorResponse(Throwable $exception, int $statusCode = Response::HTTP_NOT_FOUND): JsonResponse
    {
        return response()->json([
            'data' => [
                'success' => false,
                'message' => $exception,
            ]
        ], $statusCode);
    }

}
