<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * Class Comment
 * @package App\Models
 *
 * @property-read int $id
 * @property string $name
 * @property string $email
 * @property bool $status
 * @property int $post_id
 * @property int|null $answer
 * @property string $comment
 * @property string $ip
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Post $post
 * @property Comment|null $reply
 * @method static Builder status()
 */
class Comment extends Model
{
    use HasFactory;

    /**
     * The name of the table in the database
     * @var string
     */
    protected $table = 'comments';

    /**
     *  Indicates if the model has update and creation timestamps.
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     * Array of fields from the database
     * @var array|string[]
     */
    protected $fillable = [
        'name',
        'email',
        'status',
        'post_id',
        'answer',
        'comment',
        'ip'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reply()
    {
        return $this->belongsTo(self::class);
    }

    /**
     * @param Builder $query
     */
    public function scopeStatus(Builder $query)
    {
        $query->where('status', 1);
    }
}
