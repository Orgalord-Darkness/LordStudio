@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-red">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="mb-4">
    <label for="nom" class="block text-sm font-medium text-white">Nom</label>
    <input class="form-control mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" name="nom" type="text" id="nom" value="{{ old('nom') }}">
</div>

<div class="mb-4 {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="block text-smfont-medium text-white">{{ 'Fichier image' }}</label>
    <input class="form-control mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none text-white focus:ring-blue-500 focus:border-blue-500 sm:text-sm" name="image" type="file" id="image" accept=".jpeg,.png,.jpg,.gif" value="{{ isset($image->image) ? $image->image : ''}}">
    {!! $errors->first('image', '<p class="mt-2 text-sm text-red-600">:message</p>') !!}
</div>

<div class="flex justify-end mt-4">
    <input class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
