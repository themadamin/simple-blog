<?php

namespace Modules\Category\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Actions\FileUploadAction;
use Modules\Category\Models\Category;
use Modules\Category\Requests\CategoryRequest;
use Modules\Category\Resources\CategoryResource;

class UpdateController extends Controller
{
    public function __construct(protected FileUploadAction $fileUploadAction)
    {}
    public function __invoke(CategoryRequest $request, Category $category): JsonResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $this->fileUploadAction->execute($validated['thumbnail']);
        }

        $category->update($validated);

        return $this->resultResponse(CategoryResource::make($category));
    }
}
