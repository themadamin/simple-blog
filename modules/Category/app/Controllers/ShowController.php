<?php

namespace Modules\Category\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Category\Models\Category;
use Modules\Category\Resources\CategoryResource;

class ShowController extends Controller
{
    public function __invoke(Category $category): JsonResponse
    {
        return $this->resultResponse(CategoryResource::make($category));
    }
}
