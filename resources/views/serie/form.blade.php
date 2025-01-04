<div class="form-group {{ $errors->has('nom') ? 'has-error' : ''}}">
    <label for="nom" class="control-label">{{ 'Nom' }}</label>
    <input class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="nom" type="text" id="nom" value="{{ isset($serie->nom) ? $serie->nom : ''}}">
    {!! $errors->first('nom', '<p class="help-block text-red-500 text-xs italic">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('synopsis') ? 'has-error' : ''}}">
    <label for="synopsis" class="control-label">{{ 'Synopsis' }}</label>
    <textarea class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" rows="5" name="synopsis" type="textarea" id="synopsis">{{ isset($serie->synopsis) ? $serie->synopsis : ''}}</textarea>
    {!! $errors->first('synopsis', '<p class="help-block text-red-500 text-xs italic">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('id_categorie') ? 'has-error' : ''}}">
    <label for="id_categorie" class="control-label">{{ 'Catégorie' }}</label>
    <select class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="id_categorie" id="id_categorie">
        @foreach($categories as $categorie)
            <option value="{{ $categorie->id }}" {{ isset($serie->id_categorie) && $serie->id_categorie == $categorie->id ? 'selected' : ''}}>{{ $categorie->nom_categorie }}</option>
        @endforeach
    </select>
    {!! $errors->first('id_categorie', '<p class="help-block text-red-500 text-xs italic">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
