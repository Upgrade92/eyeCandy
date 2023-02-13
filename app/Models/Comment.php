<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;


    public static function find_by_movieId($id){

        $comments = DB::table('comments')
                        ->join('users', 'users.id', '=', 'comments.creator_id')
                        ->where('movie_id',$id)->get();
        return $comments;
    }

    public static function store(Request $request){

    }
}
