<?php

namespace Modules\Project\Models;

use App\Traits\HasThumbnail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Category\Models\Category;
use Modules\Project\Database\Factories\ProjectFactory;
use Modules\User\Models\User;

class Project extends Model
{
    use HasFactory, HasThumbnail;

    protected static function newFactory(): ProjectFactory
    {
        return ProjectFactory::new();
    }
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'body',
        'thumbnail',
        'published_at'
    ];
    protected function casts(): array
    {
        return [
            'created_at' => 'date:Y-m-d',
            'updated_at' => 'date:Y-m-d',
            'published_at' => 'date:Y-m-d',
        ];
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
