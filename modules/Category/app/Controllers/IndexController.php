<?php

namespace Modules\Category\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Category\Models\Category;
use Modules\Category\Resources\CategoryResource;

class IndexController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $categories = Category::query()->get();

        return $this->resultResponse(CategoryResource::collection($categories));
    }
}
