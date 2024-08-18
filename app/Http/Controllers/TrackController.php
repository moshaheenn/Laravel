<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    //
    public function list(){
        $tracks = Track::paginate(5);
        return view("tracks",["tracks"=>$tracks]);
    }
    function create(){
        return view("createTrack");
    }

    function store(){
        $track = new Track();
        $responce = request()->all();
        $track->name = $responce["name"];
        $track->studentNum = $responce["num"];

        $publicPath = public_path("uploads");
        $image = request()->file("image");
        $image_name = time().$image->getClientOriginalName();
        $image->move($publicPath,$image_name);
        $track->image=$image_name;

        $track->save();

        return to_route("tracks");


    }
    function update($id){
        $track = Track::find($id);
        return view("updateTrack",compact("track"));
    }
    function edit($id){
        $track = Track::find($id);
        $responce = request()->all();
        $track->name = $responce["name"];
        $track->studentNum = $responce["num"];
        $filePath = public_path("uploads");
        $image = request()->file("image");
        $image_name = time().$image->getClientOriginalName();
        $image->move($filePath,$image_name);
        $track->image=$image_name;

        $track->update();
        return to_route("tracks");
    }
    public function delete(Track $track){


        $track->delete();

        return to_route("tracks.index");
    }
    function view($id){
        $track = Track::find($id);
        return view("viewTrack",["track"=>$track]);
    }

}
