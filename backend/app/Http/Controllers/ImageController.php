<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Image;
use App\Models\Comment;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function search($name,$id)
    {
        $images=Image::where('name','like','%'.$name.'%')->get();
        if($images==NULL) return view('search');
        $images=$images->toQuery();
        $images=$images->paginate(10,'*','page',$id);
        $images=json_encode($images);
        $images=json_decode($images);
        // return $images->data;
        return view('search',['images'=>$images]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $images=Image::orderBy('created_at', 'desc')->paginate(50);

        return $images;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // return $request->all();
        $user = User::find(auth('sanctum')->user()->id);
        if(!$request->hasFile('image')) {
            return response()->json('upload_file_not_found');
        }
        $file = $request->file('image');
        if(!$file->isValid()) {
            return response()->json('invalid_file_upload');
        }

        $image=$user->images()->create([
            'name'=>request()->name,
            'detail'=>request()->detail,
        ]);
        $path = public_path() . "/storage/uploads/images/";
        $file->move($path, $image->id .'.jpg');
        $image->update([
            'image'=>"/storage/uploads/images/" .$image->id .'.jpg',
        ]);
        return response()->json($image);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $image=Image::find($id);
        $author=User::find($image->user_id);
        $comments=Comment::where('image_id',$id)->get();
        return view('image.show',['image'=>$image,'author'=>$author,'comments'=>$comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function posted($id)
    {
        $images=Image::where('user_id',$id)->get();
        // return $favorites;
        return view('user.posted',['images'=>$images]);
    }
    public function edit(Request $request,$id)
    {
        $image=Image::find($id);
        if($request->hasFile('image')) {
            if(!$file->isValid()) {
                return response()->json('invalid_file_upload');
            }
            $file = $request->file('image');
            $path = public_path() . "/storage/uploads/images/";
            $file->move($path, $image->id .'.jpg');
            $image->update([
                'image'=>"/storage/uploads/images/" .$image->id .'.jpg',
            ]);
        }
        
        $image->update([
            'name'=>$request->name,
            'detail'=>$request->detail,
        ]);
        return response()->json($image);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $image=Image::find($id);
        if($image==NULL) 
        return response()->json('Image not found');
        $image->delete();
        return response()->json('delete successfully');
    }
}
