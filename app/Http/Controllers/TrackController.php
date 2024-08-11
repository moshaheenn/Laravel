<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Track;

class TrackController extends Controller
{
    public function index()
    {
        $tracks = Track::all();
        return view('tracksData', ['tracks' => $tracks]);
    }

    public function show($id)
    {
        $track = Track::findOrFail($id);
        return view('trackDetail', ['track' => $track]);
    }

    public function destroy($id)
    {
        $track = Track::findOrFail($id);
        $track->delete();
        return redirect('/tracks')->with('success', 'Track deleted successfully');
    }
    
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $imagePath = $request->file('image')->store('track_images', 'public');

    Track::create([
        'name' => $request->name,
        'image' => $imagePath,
    ]);

    return redirect()->route('tracks.index')->with('success', 'Track added successfully!');
}





}
