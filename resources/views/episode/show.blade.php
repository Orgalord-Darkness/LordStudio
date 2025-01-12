@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Episode {{ $episode->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/episode') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/episode/' . $episode->id . '/edit') }}" title="Edit Episode"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('episode' . '/' . $episode->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Episode" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>
                        
                        <div class="card" style="background-color: #F5F5F5;">
                            <div class="card-body">
                                <h5 class="card-title">Informations sur l'épisode</h5>
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <th>ID</th><td>{{ $episode->id }}</td>
                                        </tr>
                                        <tr><th> Titre </th><td> {{ $episode->titre }} </td></tr>
                                        <tr><th> Id Série </th><td> {{ $episode->id_serie }} </td></tr>
                                        <tr><th> Saison </th><td> {{ $episode->saison }} </td></tr>
                                        <tr><th> Type </th><td> {{ $episode->type }} </td></tr>
                                        <tr><th> Path </th><td> {{ $episode->path }} </td></tr>
                                        <tr><th> Taille </th><td> {{ $episode->taille }} </td></tr>
                                        <tr><th> Extension </th><td> {{ $episode->extension }} </td></tr>
                                        <tr>
                                            <th>Vidéo : </th>
                                            <td>
                                                <div class="flex justify-center items-center bg-purple-900 p-4 rounded-lg shadow-lg">
                                                    <video class="border-4 border-purple-500 rounded-lg shadow-lg" width="640" height="360" controls preload="metadata">
                                                        <source src="{{ asset($episode->path) }}" type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                </div>  
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
