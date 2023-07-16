<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeFilter(Builder $query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn(Builder $query, $search) => $query
            ->where(fn(Builder $q) => $q
                ->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%')
            ));

        $query->when($filters['category'] ?? false, fn(Builder $query, $category) => $query
            ->whereHas('category', fn(Builder $query) => $query->where('slug', $category)
            )
        );

        $query->when($filters['author'] ?? false, fn(Builder $query, $author) => $query
            ->whereHas('author', fn(Builder $query) => $query->where('user_name', $author)
            )
        );
    }
}
