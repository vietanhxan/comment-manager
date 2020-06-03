<?php

return [

    'namespace'       => env('COMMENT_COMPONENT_NAMESPACE', 'comment-management'),

    'models'          => [
        'comment' => VCComponent\Laravel\Comment\Entities\Comment::class,
    ],

    'transformers'    => [
        'comment' => VCComponent\Laravel\Comment\Transformers\CommentTransformer::class,
    ],

    'auth_middleware' => [
        'admin'    => [
            'middleware' => '',
            'except'     => [],
        ],
        'frontend' => [
            'middleware' => '',
            'except'     => [],
        ],
    ],

];
