<?php

namespace App\Models;

use App\Models\Concerns\HasUniqueSlug;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasUniqueSlug;

    protected $fillable = [
        'title', 'slug', 'description', 'image_url', 'tech_stack',
        'live_url', 'repo_url', 'featured', 'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'featured' => 'boolean',
        ];
    }

    /** @return array<int, string> */
    public function techList(): array
    {
        return collect(explode(',', (string) $this->tech_stack))
            ->map(fn ($t) => trim($t))
            ->filter()
            ->values()
            ->all();
    }
}
