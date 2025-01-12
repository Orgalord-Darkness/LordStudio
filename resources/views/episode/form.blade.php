<div class="form-group {{ $errors->has('titre') ? 'has-error' : '' }}">
    <label for="titre" class="control-label text-purple-300">{{ 'Titre' }}</label>
    <input class="form-control bg-gray-800 text-white border border-purple-500 rounded-lg p-2" name="titre" type="text" id="titre" value="{{ isset($episode->titre) ? $episode->titre : '' }}">
    {!! $errors->first('titre', '<p class="help-block text-red-500">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('id_serie') ? 'has-error' : '' }}">
    <label for="id_serie" class="control-label text-purple-300">{{ 'Id Série' }}</label>
    <select class="form-control bg-gray-800 text-white border border-purple-500 rounded-lg p-2" name="id_serie" id="id_serie">
        @foreach($series as $serie)
            <option value="{{ $serie->id }}" {{ isset($episode->id_serie) && $episode->id_serie == $serie->id ? 'selected' : '' }}>
                {{ $serie->nom }}
            </option>
        @endforeach
    </select>
    {!! $errors->first('id_serie', '<p class="help-block text-red-500">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('saison') ? 'has-error' : '' }}">
    <label for="saison" class="control-label text-purple-300">{{ 'Saison' }}</label>
    <input class="form-control bg-gray-800 text-white border border-purple-500 rounded-lg p-2" name="saison" type="number" id="saison" value="{{ isset($episode->saison) ? $episode->saison : '' }}">
    {!! $errors->first('saison', '<p class="help-block text-red-500">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
    <label for="type" class="control-label text-purple-300">{{ 'Type' }}</label>
    <select class="form-control bg-gray-800 text-white border border-purple-500 rounded-lg p-2" name="id_serie" id="id_serie">
        <option value="episode">Episode</option>
        <option value="trailer">Trailer</option>
    </select>
</div>

<div class="form-group {{ $errors->has('file') ? 'has-error' : '' }}">
    <label for="file" class="control-label text-purple-300">{{ 'Fichier Vidéo' }}</label>
    <input class="form-control bg-gray-800 text-white border border-purple-500 rounded-lg p-2" name="file" accept= "mp4" type="file" id="file">
    {!! $errors->first('file', '<p class="help-block text-red-500">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary bg-purple-700 hover:bg-purple-800 text-white rounded-lg py-2 px-4" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
