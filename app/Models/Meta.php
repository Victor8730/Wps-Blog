<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Meta
 * @package App\Models
 *
 * @property-read int $id
 * @property int $post_id
 * @property string|null $description
 * @property string|null $keywords
 * @property string|null $title
 * @property string|null $h1
 *
 * @property Post $post
 */
class Meta extends LocalizedModel
{
    use HasFactory;

    /**
     * The name of the table in the database
     * @var string
     */
    protected $table = 'metas';

    /**
     *  Indicates if the model has update and creation timestamps.
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     * Array of fields from the database
     * @var array|string[]
     */
    protected $fillable = [
        'id',
        'post_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
