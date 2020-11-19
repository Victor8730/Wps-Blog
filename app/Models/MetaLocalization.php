<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaLocalization extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'lang',
        'description',
        'keywords',
        'title',
        'h1',
    ];

    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function meta()
    {
        return $this->belongsTo(Meta::class);
    }
}
