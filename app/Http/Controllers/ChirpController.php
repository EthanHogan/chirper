<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Welcome', [
            'chirps' => Chirp::orderBy('id', 'desc') ->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file = null;
        $extension = null;
        $fileName = null;
        $path = '';

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $request->validate([
                'file' => 'required|mimes:jpg,jpeg,png,mp4'
            ]);
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $extension == 'mp4' ? $path = '/videos/' : $path = '/pics/';
        }

        $chirp = new Chirp;

        $chirp->name = 'Ethan Hogan';
        $chirp->handle = '@EthanHogan_';
        $chirp->image = 'https://pbs.twimg.com/profile_images/1091191107092967424/_HR8X964_400x400.jpg';
        $chirp->chirp = $request->input('chirp');
        if ($fileName) {
            $chirp->file = $path . $fileName;
            $chirp->is_video = $extension == 'mp4' ? true : false;
            $file->move(public_path() . $path, $fileName);
        }
        // make some fake data about the chirp
        $chirp->comments = rand(5, 500);
        $chirp->rechirps = rand(5, 500);
        $chirp->likes = rand(5, 500);
        $chirp->analytics = rand(5, 500);

        $chirp->save();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     */
    public function destroy($id)
    {
        $chirp = Chirp::find($id);

        if (!is_null($chirp->file) && file_exists(public_path() . $chirp->file)) {
            unlink(public_path() . $chirp->file);
        }

        $chirp->delete();
    }
}
