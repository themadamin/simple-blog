<?php

namespace Modules\Category\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Category\Models\Category;
use Modules\Category\Requests\CategoryRequest;
use Modules\Category\Resources\CategoryResource;

class UpdateController extends Controller
{
    public function __invoke(CategoryRequest $request, Category $category): JsonResponse
    {
        $validated = $request->validated();

        $category->update([
            'name' => $validated['name'],
        ]);

        if ($request->hasFile('thumbnail')) {
            $category->clearMediaCollection();
            $category->uploadFile($request->file('thumbnail'))->toMediaCollection('category');
        }

        return $this->resultResponse(CategoryResource::make($category));
    }
}
