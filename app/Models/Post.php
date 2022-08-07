<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory; // Post::factory()

    protected $guarded = []; // = ['id']
    //protected  $fillable = ['title', 'excerpt', 'body', 'id'];

    protected $with = ['category', 'author']; // helper method h ne kelljen mindig beleírni hosszan a routnal azt a sort

    public function scopeFilter($query, array $filters) // Post::newQuery()->filter()
    {
        $query->when($filters['search'] ?? false, fn ($query, $search) =>
            $query->where(fn($query) =>
                $query->where('title', 'like', '%' . request('search') . '%')
                    ->orWhere('body', 'like', '%' . request('search') . '%')
            )
        );

        $query->when($filters['category'] ?? false, fn ($query, $category) =>
            $query->whereHas('category', fn ($query) =>
                $query->where('slug', $category))
        );

        $query->when($filters['author'] ?? false, fn ($query, $author) =>
            $query->whereHas('author', fn ($query) =>
                $query->where('username', $author))
        );
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        //hasOne, HasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function author() // author_id
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
