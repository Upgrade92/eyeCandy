<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use PhpParser\Node\Expr\Cast\Array_;

class Comment extends Model
{
    use HasFactory;


    public static function find_by_movieId($id){

        $comments = DB::table('comments')
                        ->join('users', 'users.id', '=', 'comments.creator_id')
                        ->where('movie_id',$id)->get();
        return $comments;
    }

    public static function store($formFields,$movie_id){
        // dd($formFields);
        DB::table('comments')->insert([
            'creator_id'=>auth()->id(),
            'movie_id' =>$movie_id,
            'content'=>$formFields['content'],

        ]);

        DB::table('users')->where('id', auth()->user()->id)->increment(
            'comments');
        
    }
}
