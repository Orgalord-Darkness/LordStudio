@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ url('/categorie/create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" title="Add New Categorie">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        
                        <form method="GET" action="{{ url('/categorie') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom Categorie</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Create At</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Update At</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($categorie as $item)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $item->nom_categorie }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $item->create_at }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $item->update_at }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <a href="{{ url('/categorie/' . $item->id) }}" title="View Categorie"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                                <a href="{{ url('/categorie/' . $item->id . '/edit') }}" title="Edit Categorie"><button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                                <form method="POST" action="{{ url('/categorie' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" title="Delete Categorie" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                            <div class="pagination-wrapper"> {!! $categorie->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
