<?php

namespace Modules\Category\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Category\Models\Category;
use Modules\Category\Requests\CategoryRequest;
use Modules\Category\Resources\CategoryResource;

class StoreController extends Controller
{
    public function __invoke(CategoryRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $category = Category::create([
            'name' => $validated['name'],
        ]);

        if ($request->hasFile('thumbnail')) {
            $category->uploadFile($request->file('thumbnail'))->toMediaCollection('category');
        }

        return $this->resultResponse(CategoryResource::make($category));
    }
}
