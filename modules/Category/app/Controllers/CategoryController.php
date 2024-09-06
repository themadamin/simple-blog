<?php

namespace Modules\Category\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Category\Models\Category;
use Modules\Category\Requests\CategoryRequest;
use Modules\Category\Resources\CategoryResource;
use Storage;

class CategoryController extends Controller
{
    public function index(): JsonResponse|JsonResource
    {
        $categories = Category::query()->get();

        return $this->resultResponse(CategoryResource::collection($categories));
    }

    public function store(CategoryRequest $request): JsonResponse|JsonResource
    {
        $validated = $request->validated();

        if ($request->hasFile('thumbnail')) {
            $filename = uniqid(). '.' .$validated['thumbnail']->getClientOriginalName();

            $path = $validated['thumbnail']->storeAs('category', $filename, 'public');

            $validated['thumbnail'] = $path;
        }

        $category = Category::create($validated);

        return $this->resultResponse(CategoryResource::make($category));
    }

    public function show(Category $category): JsonResponse|JsonResource
    {
        return $this->resultResponse(CategoryResource::make($category));
    }

    public function update(CategoryRequest $request, Category $category): JsonResponse|JsonResource
    {
        $validated = $request->validated();

        if ($request->hasFile('thumbnail')) {
            $filename = uniqid(). '.' .$validated['thumbnail']->getClientOriginalName();

            $path = $validated['thumbnail']->storeAs('category', $filename, 'public');

            $validated['thumbnail'] = $path;
        }

        $category->update($validated);

        return $this->resultResponse(CategoryResource::make($category));
    }

    public function destroy(Category $category): JsonResponse
    {
        $category->delete();

        return $this->successResponse('Category deleted');
    }
}
