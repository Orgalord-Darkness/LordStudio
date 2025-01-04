@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-gray-900 p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-purple-400 mb-4">Image Details</h1>
        <div class="mb-4">
            <div class="text-gray-300">Path: {{ $image->path }}</div>
            <div class="text-gray-300">Size: {{ $image->taille }}</div>
            <div class="text-gray-300">Extension: {{ $image->extension }}</div>
        </div>
        <a href="{{ url('/image/' . $image->id . '/edit') }}" title="Edit Image"><button class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">Edit</button></a>
        <form method="POST" action="{{ url('image' . '/' . $image->id) }}" style="display:inline">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" title="Delete Image" onclick="return confirm(&quot;Confirm delete?&quot;)" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Delete</button>
        </form>
    </div>
</div>
@endsection
