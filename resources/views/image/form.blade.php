<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Fichier image' }}</label>
    <input class="form-control" name="image" type="file" id="image" accept=".jpeg,.png,.jpg,.gif" value="{{ isset($image->image) ? $image->image : ''}}">
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>

<div class="flex justify-end">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
