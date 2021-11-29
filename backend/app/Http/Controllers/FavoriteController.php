<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\User;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addFavorite($id)
    {
        $user = User::find(auth('sanctum')->user()->id);
        $image=Image::find($id);
        if($image==NULL) return response()->json(['Image not found']);
        $Favorite=Favorite::create([
            'user_id'=>$user->id,
            'image_id'=>$id,
        ]);
        return response()->json([$Favorite]);
    }   
    public function deleteFavorite($id)
    {
        $Favorite=Favorite::find($id)->delete();
        return response()->json([$Favorite]);
    }   
    public function allImageFavorite($id)
    {
        return response()->json(Favorite::where('user_id',$id)->get());
    }

    public function index($id)
    {
        $favorite=Favorite::where('image_id',$id)->where('user_id',auth('sanctum')->user()->id)->get();
        return response()->json($favorite);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $favorites=Favorite::where('user_id',$id)->get();
        // return $favorites;
        return view('user.favorite',['favorites'=>$favorites]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function edit(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Favorite $favorite)
    {
        //
    }
}
