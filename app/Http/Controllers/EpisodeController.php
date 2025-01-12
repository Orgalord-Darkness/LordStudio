<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Episode;
use App\Models\Serie ; 
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $episode = Episode::latest()->paginate($perPage);
        } else {
            $episode = Episode::latest()->paginate($perPage);
        }

        return view('episode.index', compact('episode'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $series = Serie::all() ; 
        return view('episode.create', compact('series'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'file' => 'required|file|mimes:mp4|max:819200', // 800MB in kilobytes
        ]);

        try {
            $fichier = $request->file('file');
            $fichierNom = $fichier->getClientOriginalName();
            $publicDirectory = public_path('videos/episode');

            if (!is_dir($publicDirectory)) {
                mkdir($publicDirectory, 0755, true);
            }

            $emplacement = $publicDirectory . '/' . $fichierNom;
            $fichier->move($publicDirectory, $fichierNom);

            $taille = $fichier->getSize();
            $extension = $fichier->getClientOriginalExtension();

            $data = [
                'titre' => $request->input('titre'),
                'id_serie' => $request->input('id_serie'),
                'saison' => $request->input('saison'),
                'type' => $request->input('type'),
                'path' => 'videos/episode/' . $fichierNom,
                'taille' => $taille,
                'extension' => '.' . $extension,
            ];

            Episode::create($data);

            return redirect()->route('episode.index');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $episode = Episode::findOrFail($id);

        return view('episode.show', compact('episode'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $episode = Episode::findOrFail($id);
         $series = Serie::all() ; 
        return view('episode.edit', compact('series','episode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'image' => 'file|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $image = Image::findOrFail($id);
            $image->nom = $request->input('nom');

            if ($request->hasFile('episode')) {
                $fichier = $request->file('episode');
                $fichierNom = $fichier->getClientOriginalName();
                $publicDirectory = public_path('episode');

                if (!is_dir($publicDirectory)) {
                    mkdir($publicDirectory, 0755, true);
                }

                $emplacement = $publicDirectory . '/' . $fichierNom;

                if (!move_uploaded_file($fichier->getPathname(), $emplacement)) {
                    throw new \Exception('Failed to move uploaded file.');
                }

                $taille = filesize($emplacement);
                $extension = pathinfo($emplacement, PATHINFO_EXTENSION);
                $image->path = 'fichiers/videos/episode/' . $fichierNom;
                $image->taille = $taille;
                $image->extension = '.' . $extension;
            }

            $image->save();

            return redirect()->route('episode.index');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Episode::destroy($id);

        return redirect('episode')->with('flash_message', 'Episode deleted!');
    }
}
