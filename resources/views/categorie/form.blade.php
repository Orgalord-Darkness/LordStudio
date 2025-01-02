<div class="form-group {{ $errors->has('nom_categorie') ? 'has-error' : ''}}">
    <label for="nom_categorie" class="control-label">{{ 'Nom Categorie' }}</label>
    <input class="form-control" name="nom_categorie" type="text" id="nom_categorie" value="{{ isset($categorie->nom_categorie) ? $categorie->nom_categorie : ''}}" >
    {!! $errors->first('nom_categorie', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('create_at') ? 'has-error' : ''}}">
    <label for="create_at" class="control-label">{{ 'Create At' }}</label>
    <input class="form-control" name="create_at" type="datetime-local" id="create_at" value="{{ isset($categorie->create_at) ? $categorie->create_at : ''}}" >
    {!! $errors->first('create_at', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('update_at') ? 'has-error' : ''}}">
    <label for="update_at" class="control-label">{{ 'Update At' }}</label>
    <input class="form-control" name="update_at" type="datetime-local" id="update_at" value="{{ isset($categorie->update_at) ? $categorie->update_at : ''}}" >
    {!! $errors->first('update_at', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
