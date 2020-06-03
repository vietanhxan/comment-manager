<?php

namespace VCComponent\Laravel\Comment\Entities;

use Illuminate\Database\Eloquent\Model;
use VCComponent\Laravel\Comment\Traits\HasCommentTrait;

class Comment extends Model
{
    use HasCommentTrait;

    const STATUS_PENDING = 0;
    const STATUS_ACTIVE  = 1;

    protected $fillable = [
        'commentable_id',
        'commentable_type',
        'email',
        'name',
        'content',
        'status',
    ];

    public function commentable()
    {
        return $this->morphTo();
    }
}
