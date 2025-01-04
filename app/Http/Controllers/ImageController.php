<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Image;
use Illuminate\Http\Request;

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
        // Validez que l'image est bien fournie
        $request->validate([
            'image' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Gérer le téléchargement du fichier
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('images', 'public');

            // Préparer les données pour l'insertion
            $requestData = $request->all();
            $requestData['path'] = $path;
            $requestData['taille'] = $file->getSize();
            $requestData['extension'] = $file->getClientOriginalExtension();

            // Insérer les données dans la base de données
            Image::create($requestData);
        } else {
            return redirect('image/create')->withErrors(['image' => 'Le téléchargement de l\'image a échoué.']);
        }

        return redirect('image')->with('flash_message', 'Image ajoutée avec succès !');
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
        $request->validate([
            'image' => 'sometimes|file|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $file = $request->file('image');
        if ($file) {
            $path = $file->store('images', 'public');

            $requestData = $request->all();
            $requestData['path'] = $path;
            $requestData['taille'] = $file->getSize();
            $requestData['extension'] = $file->getClientOriginalExtension();
        } else {
            $requestData = $request->all();
        }

        $image = Image::findOrFail($id);
        $image->update($requestData);

        return redirect('image')->with('flash_message', 'Image mise à jour avec succès !');
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

        return redirect('image')->with('flash_message', 'Image deleted!');
    }
}
