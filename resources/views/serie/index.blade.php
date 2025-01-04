{{-- @extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Serie</div>
                    <div class="card-body">
                        <a href="{{ url('/serie/create') }}" class="btn btn-success btn-sm" title="Add New Serie">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/serie') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Nom</th><th>Synopsis</th><th>Id Categorie</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($serie as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nom }}</td><td>{{ $item->synopsis }}</td><td>{{ $item->id_categorie }}</td>
                                        <td>
                                            <a href="{{ url('/serie/' . $item->id) }}" title="View Serie"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/serie/' . $item->id . '/edit') }}" title="Edit Serie"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/serie' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Serie" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $serie->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap">
            @include('admin.sidebar')

            <div class="w-full">
                <div class="bg-gray-900 text-white shadow-md rounded-lg overflow-hidden">
                    <div class="bg-purple-800 text-white text-lg px-6 py-4">
                        Series
                    </div>
                    <div class="p-6">
                        <a href="{{ url('/serie/create') }}" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block" title="Add New Serie">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/serie') }}" accept-charset="UTF-8" class="flex justify-end mb-4">
                            <div class="relative">
                                <input type="text" class="form-input block w-full pl-10 sm:text-sm sm:leading-5" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <button class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 hover:text-gray-700" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>

                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-gray-900 text-white">
                                <thead>
                                    <tr class="w-full bg-purple-700 text-white uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-left">#</th>
                                        <th class="py-3 px-6 text-left">Nom</th>
                                        <th class="py-3 px-6 text-left">Synopsis</th>
                                        <th class="py-3 px-6 text-left">Catégorie</th>
                                        <th class="py-3 px-6 text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-white text-sm font-light">
                                @foreach($serie as $item)
                                    <tr class="border-b border-gray-700 hover:bg-gray-800">
                                        <td class="py-3 px-6 text-left whitespace-nowrap">{{ $loop->iteration }}</td>
                                        <td class="py-3 px-6 text-left">{{ $item->nom }}</td>
                                        <td class="py-3 px-6 text-left">{{ $item->synopsis }}</td>
                                        <td class="py-3 px-6 text-left">{{ $item->categorie->nom_categorie }}</td>
                                        <td class="py-3 px-6 text-center">
                                            <div class="flex item-center justify-center space-x-2">
                                                <a href="{{ url('/serie/' . $item->id_serie) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded" title="View Serie">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                </a>
                                                <a href="{{ url('/serie/' . $item->id_serie . '/edit') }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded" title="Edit Serie">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                </a>
                                                <form method="POST" action="{{ url('/serie' . '/' . $item->id_serie) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" title="Delete Serie" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper mt-4"> {!! $serie->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
