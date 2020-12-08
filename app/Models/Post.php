<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public static $pagesToCache = 10;

    public static $itemsPerPage = 5;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'published_at' => 'datetime'
    ];

    /**
     * Get the author of the post
     *
     * @return Illuminate\Database\Eloquent\Factories\Relationship
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

   /**
     * Scope the query to order by published_at
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByMostRecent(Builder $query)
    {
        return $query->orderByDesc('published_at');
    }

    /**
     * Mutator to get the published date in a nicer format
     *
     * @return string
     */
    public function getPublishDateAttribute()
    {
        return $this->published_at->toFormattedDateString();
    }
}
