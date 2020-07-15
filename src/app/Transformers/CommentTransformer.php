<?php

namespace VCComponent\Laravel\Comment\Transformers;

use League\Fractal\TransformerAbstract;
use VCComponent\Laravel\Comment\Entities\Comment;
use VCComponent\Laravel\Post\Transformers\PostTransformer;
use VCComponent\Laravel\Product\Transformers\ProductTransformer;

class CommentTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'post',
        'product',
    ];

    public function __construct($includes = [])
    {
        $this->setDefaultIncludes($includes);
    }

    public function transform(Comment $model)
    {
        return [
            'id'               => (int) $model->id,
            'commentable_id'   => (int) $model->commentable_id,
            'commentable_type' => $model->commentable_type,
            'email'            => $model->email,
            'name'             => $model->name,
            'content'          => $model->content,
            'status'           => $model->status,
            'timestamps'       => [
                'created_at' => $model->created_at,
                'updated_at' => $model->updated_at,
            ],
        ];
    }

    public function includePost(Comment $model)
    {
        if (!empty($model->post)) {
            return $this->item($model->post, new PostTransformer);
        }
    }

    public function includeProduct(Comment $model)
    {
        if (!empty($model->product)) {
            return $this->item($model->product, new ProductTransformer);
        }
    }
}
