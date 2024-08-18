<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Track;
use Illuminate\Support\Facades\Storage;

class TrackController extends Controller
{
   

    // Display a listing of the tracks
    public function index()
    {
        $tracks = Track::all();
        return view('tracksData', ['tracks' => $tracks]);
    }

    // Display the specified track details
    public function show($id)
    {
        $track = Track::findOrFail($id);
        return view('trackDetail', ['track' => $track]);
    }

    // Remove the specified track from storage
    public function destroy($id)
    {
        $track = Track::findOrFail($id);
        
        // Delete the associated image from storage
        if ($track->image) {
            Storage::delete('public/' . $track->image);
        }

        // Delete the track from the database
        $track->delete();
        
        return redirect('/tracks')->with('success', 'Track deleted successfully');
    }

    // Show the form for creating a new track
    public function create()
    {
        return view('tracks.create');
    }

    // Store a newly created track in storage
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $imagePath = $request->file('image') ? $request->file('image')->store('track_images', 'public') : null;
    
        Track::create([
            'title' => $request->title,
            'image' => $imagePath,
        ]);
    
        return redirect()->route('tracks.index')->with('success', 'Track created successfully!');
    }

    // Show the form for editing the specified track
    public function edit(Track $track)
    {
        return view('tracks.edit', compact('track'));
    }

    // Update the specified track in storage
    public function update(Request $request, Track $track)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete the old image from storage
            if ($track->image) {
                Storage::delete('public/' . $track->image);
            }

            // Store the new image
            $track->image = $request->file('image')->store('track_images', 'public');
        }

        // Update the track details
        $track->title = $request->title;
        $track->save();

        return redirect()->route('tracks.index')->with('success', 'Track updated successfully!');
    }
}
