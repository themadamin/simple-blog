<?php

namespace Modules\Project\Actions;

use Modules\Project\Models\Project;

class UpdateProjectAction
{
    public function execute(Project $project, array $validated, $thumbnail = null): void
    {
        $project->update([
            'category_id' => $validated['category_id'],
            'title' => $validated['title'],
            'body' => $validated['body'],
            'published_at' => $validated['published_at'] ?? now(),
        ]);

        if ($thumbnail) {
            $project->clearMediaCollection();
            $project->uploadFile($thumbnail)->toMediaCollection('project');
        }
    }
}
