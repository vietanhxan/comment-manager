<?php

namespace VCComponent\Laravel\Comment\Actions;

use VCComponent\Laravel\Comment\Entities\CommentCount;

class CommentCountAction
{
    public function addComment(array $data)
    {
        $commentable_type = $data['commentable_type'];
        $commentable_id   = $data['commentable_id'];

        $result = CommentCount::where('commentable_id', $commentable_id)->where('commentable_type', $commentable_type)->first();

        if ($result) {
            $count        = $result->count + 1;
            $commentCount = CommentCount::where('commentable_id', $commentable_id)->where('commentable_type', $commentable_type)->update([
                'count' => $count,
            ]);
        } else {
            $commentCount = CommentCount::create($data);
        }
    }

    public function delComment(array $data)
    {
        $commentable_type = $data['commentable_type'];
        $commentable_id   = $data['commentable_id'];

        $result = CommentCount::where('commentable_id', $commentable_id)->where('commentable_type', $commentable_type);

        if ($result->first()) {
            $count = $result->first()->count - 1;
            if ($count === 0) {
                $result->delete();
            } else {
                $result->update(['count' => $count]);
            }
        }

    }
}
