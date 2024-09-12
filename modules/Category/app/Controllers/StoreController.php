<?php

namespace Modules\Category\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Actions\FileUploadAction;
use Modules\Category\Models\Category;
use Modules\Category\Requests\CategoryRequest;
use Modules\Category\Resources\CategoryResource;

class StoreController extends Controller
{
    public function __construct(protected FileUploadAction $fileUploadAction)
    {}
    public function __invoke(CategoryRequest $request): JsonResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $this->fileUploadAction->execute($validated['thumbnail']);
        }

        $category = Category::create($validated);

        return $this->resultResponse(CategoryResource::make($category));
    }
}
