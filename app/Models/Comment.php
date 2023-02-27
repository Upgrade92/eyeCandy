<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;


    public static function find_by_movieId($id){

        $comments = DB::table('comments')
                        ->join('users', 'users.id', '=', 'comments.creator_id')
                        ->where('movie_id', $id)
                        // ->where('media_type', $media_type)
                        ->get();
        return $comments;
    }

    public static function store($formFields, $movie_id){

        DB::table('comments')->insert([
            'creator_id' => auth()->id(),
            'movie_id' => $movie_id,
            // 'media_type' => $media_type,
            'content'=> $formFields['content'],

        ]);

        DB::table('users')->where('id', auth()->user()->id)
            ->increment('comments');
        
    }
}
