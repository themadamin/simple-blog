<?php

namespace Modules\Category\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Category\Models\Category;
use Modules\Category\Resources\CategoryResource;

class DeleteController extends Controller
{
    public function __invoke(Category $category): JsonResponse
    {
        $category->clearMediaCollection();

        $category->delete();

        return $this->successResponse('Category deleted');
    }
}
