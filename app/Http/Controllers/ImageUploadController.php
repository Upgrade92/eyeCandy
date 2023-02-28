<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
  
class ImageUploadController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:4096',
        ]);
      
        $imageName = auth()->user()->name.'_profile_pic.'.$request->image->extension();  
        $request->image->move(public_path('images/profile_pics'), $imageName);
    
        DB::table('users')->where('id', auth()->user()->id)
            ->update(['profile_img' => '/images/profile_pics/'.$imageName]);
      
        return redirect('show')->with('message','image uploaded!');
    }
    
}