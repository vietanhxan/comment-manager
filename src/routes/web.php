<?php
Route::middleware('web')->group(function(){
    Route::post('comment','VCComponent\Laravel\Comment\Http\Controllers\Web\CommentController@store');
});
