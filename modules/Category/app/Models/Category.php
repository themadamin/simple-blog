<?php

namespace Modules\Category\Models;

use App\Traits\HasThumbnail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Kalnoy\Nestedset\NodeTrait;
use Modules\Category\Database\factories\CategoryFactory;
use Modules\Project\Models\Project;

class Category extends Model
{
    use HasFactory, HasThumbnail, NodeTrait;

    protected static function newFactory(): CategoryFactory
    {
        return CategoryFactory::new();
    }

    protected $fillable = ['name', 'thumbnail'];

    protected function casts(): array
    {
        return [
            'created_at' => 'date:Y-m-d',
            'updated_at' => 'date:Y-m-d'
        ];
    }
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }
}
