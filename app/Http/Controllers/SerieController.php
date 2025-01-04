<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Serie;
use App\Models\Categorie;
use Illuminate\Http\Request;

class SerieController extends Controller
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
            $serie = Serie::with('categorie')
                ->orWhere('nom', 'LIKE', "%$keyword%")
                ->orWhere('synopsis', 'LIKE', "%$keyword%")
                ->orWhere('id_categorie', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $serie = Serie::latest()->paginate($perPage);
        }

        return view('serie.index', compact('serie'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('serie.create', compact('categories'));
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
        
        $requestData = $request->all();
        Serie::create($requestData);
        return redirect('serie')->with('flash_message', 'Serie added!');
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
        $serie = Serie::findOrFail($id);

        return view('serie.show', compact('serie'));
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
        $categories = Categorie::all() ; 
        $serie = Serie::findOrFail($id);

        return view('serie.edit', compact('serie'), ['categories' => $categories]);
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
        
        // $requestData = $request->all();
        // $serie = Serie::findOrFail($id);
        // $serie->update($requestData);

        // return redirect('serie')->with('flash_message', 'Serie updated!');
        $serie = Serie::findOrFail($id); 
        $serie->update(['nom' => $request->input('nom')]); 
        return redirect()->route('serie.index')->with('success', 'Série mise à jour avec succès') ; 
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
        Serie::destroy($id);

        return redirect('serie')->with('flash_message', 'Serie deleted!');
    }
}
