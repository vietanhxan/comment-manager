<?php

namespace VCComponent\Laravel\Comment\Transformers;

use League\Fractal\TransformerAbstract;
use VCComponent\Laravel\Comment\Entities\Comment;

class CommentTransformer extends TransformerAbstract
{
    public function transform(Comment $model)
    {
        return [
            'id'               => (int) $model->id,
            'commentable_id'   => (int) $model->commentable_id,
            'commentable_type' => $model->commentable_type,
            'email'            => $model->email,
            'name'             => $model->name,
            'content'          => $model->content,
            'timestamps'       => [
                'created_at' => $model->created_at,
                'updated_at' => $model->updated_at,
            ],
        ];
    }
}
