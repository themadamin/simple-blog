<?php

namespace Modules\Project\Actions;

use Modules\Project\Models\Project;

class CreateProjectAction
{
    public function execute(array $validated, $thumbnail = null): void
    {
        $project = Project::create([
            'user_id' => auth()->id(),
            'category_id' => $validated['category_id'],
            'body' => $validated['body'],
            'title' => $validated['title'],
            'published_at' => $validated['published_at'] ?? now(),
        ]);

        if ($thumbnail) {
            $project->uploadFile($thumbnail)->toMediaCollection('project');
        }
    }
}
