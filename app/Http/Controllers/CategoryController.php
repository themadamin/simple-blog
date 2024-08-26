<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()->paginate(5);

        return $this->paginationResponse($categories);
    }

    public function store(CategoryRequest $request)
    {
        $validated = $request->validated();

        Category::create($validated);

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
