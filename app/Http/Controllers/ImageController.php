<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class ImageController extends Controller
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
            $image = Image::latest()->paginate($perPage);
        } else {
            $image = Image::latest()->paginate($perPage);
        }

        return view('image.index', compact('image'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('image.create');
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
            'nom' => 'required|string|max:255',
            'image' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            // Obtenez les détails du fichier téléchargé
            $fichier = $request->file('image');
            $fichierNom = $fichier->getClientOriginalName();
            $publicDirectory = public_path('image');

            // Créez le répertoire s'il n'existe pas
            if (!is_dir($publicDirectory)) {
                mkdir($publicDirectory, 0755, true);
            }
            $emplacement = $publicDirectory . '/' . $fichierNom;
            // Déplacez le fichier vers le répertoire spécifié
            if (!move_uploaded_file($fichier->getPathname(), $emplacement)) {
                throw new \Exception('Failed to move uploaded file.');
            }

            // Obtenez les détails supplémentaires du fichier déplacé
            $taille = filesize($emplacement);
            $extension = pathinfo($emplacement, PATHINFO_EXTENSION);

            $data = [
                'nom' => $request->input('nom'),
                'path' => 'fichiers/' . $fichierNom,
                'taille' => $taille,
                'extension' => '.' . $extension,
            ];

            Image::create($data);

            return redirect()->route('image.index');
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
        $image = Image::findOrFail($id);

        return view('image.show', compact('image'));
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
        $image = Image::findOrFail($id);
        return view('image.edit', compact('image'));
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

            if ($request->hasFile('image')) {
                $fichier = $request->file('image');
                $fichierNom = $fichier->getClientOriginalName();
                $publicDirectory = public_path('fichiers');

                if (!is_dir($publicDirectory)) {
                    mkdir($publicDirectory, 0755, true);
                }

                $emplacement = $publicDirectory . '/' . $fichierNom;

                if (!move_uploaded_file($fichier->getPathname(), $emplacement)) {
                    throw new \Exception('Failed to move uploaded file.');
                }

                $taille = filesize($emplacement);
                $extension = pathinfo($emplacement, PATHINFO_EXTENSION);
                $image->path = 'fichiers/' . $fichierNom;
                $image->taille = $taille;
                $image->extension = '.' . $extension;
            }

            $image->save();

            return redirect()->route('images.index');
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
        Image::destroy($id);

        return redirect('images')->with('flash_message', 'Image deleted!');
    }
}
