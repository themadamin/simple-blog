<?php

namespace Modules\Category\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryRequest;
use App\Http\Resources\CategoryResource;
use Modules\Category\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()->get();

        return $this->resultResponse(CategoryResource::collection($categories));
    }

    public function store(CategoryRequest $request)
    {
        $validated = $request->validated();

        Category::create([
            'name' => $validated['name'],
        ]);

        return $this->successResponse('Category created');
    }

    public function show(Category $category)
    {
        return $this->resultResponse(CategoryResource::make($category));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $validated = $request->validated();

        $category->update($validated);

        return $this->successResponse('Category updated');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return $this->successResponse('Category deleted');
    }
}
