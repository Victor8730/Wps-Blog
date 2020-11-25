<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Carbon\Carbon;

/**
 * Class Post
 * @package App\Models
 *
 * @property-read int $id
 * @property string $name
 * @property string $slug
 * @property bool $publish
 * @property string|null $image
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property array|Collection|Category[] $category
 * @property array|Collection|Tag[] $tags
 * @property array|Collection|Comment $comments
 * @property array|Collection|Image $images
 * @property Meta $meta
 * @method static Builder publish()
 * @method Builder whereSlug(string $slug)
 */
class Post extends LocalizedModel
{
    use HasFactory;

    /**
     * The name of the table in the database
     * @var string
     */
    protected $table = 'posts';

    /**
     *  Indicates if the model has update and creation timestamps.
     * @var bool
     */
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'slug',
        'publish',
        'image',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function meta()
    {
        return $this->hasOne(Meta::class);
    }

    /**
     * @param Builder $query
     */
    public function scopePublish(Builder $query)
    {
        $query->where('publish', 1);
    }

    /**
     * @param Builder $query
     * @param string $slug
     */
    public function scopeWhereSlug(Builder $query, string $slug)
    {
        $query->where('slug', $slug);
    }

    /**
     * @param $value
     * @return string
     */
    public function getImageAttribute($value)
    {
        return !$value ?: \Storage::url($value);
    }

//    public function getShortPreviewAttribute()
//    {
//        return Str::limit($this->preview, 30);
//    }
}
