@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card bg-gray-900 text-gray-300">
                    <div class="card-header text-purple-300">Images</div>
                    <div class="card-body">
                        <a href="{{ url('/images/create') }}" class="btn btn-success btn-sm" title="Add New Image">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/image') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                            <table class="table text-gray-300">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Nom</th>
                                        <th>Path</th>
                                        <th>Taille</th>
                                        <th>Extension</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($image as $item)
                                    <tr>
                                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                        <td class="px-4 py-2">
                                            <img src="{{ url($item->path) }}" alt="{{ $item->nom }}" class="w-16 h-16 rounded">

                                        </td>
                                        <td class="px-4 py-2">{{ $item->nom }}</td>
                                        <td class="px-4 py-2">{{ $item->path }}</td>
                                        <td class="px-4 py-2">{{ $item->taille }}</td>
                                        <td class="px-4 py-2">{{ $item->extension }}</td>
                                        <td class="px-4 py-2">
                                            <a href="{{ url('/images/' . $item->id_image) }}" title="View Image">
                                                <button class="btn btn-info btn-sm text-white bg-blue-500 hover:bg-blue-700 px-3 py-1 rounded-md">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                </button>
                                            </a>
                                            <a href="{{ url('/images/' . $item->id_image . '/edit') }}" title="Edit Image">
                                                <button class="btn btn-primary btn-sm text-white bg-green-500 hover:bg-green-700 px-3 py-1 rounded-md">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                </button>
                                            </a>
                                            <form method="POST" action="{{ url('/images' . '/' . $item->id_image) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm text-white bg-red-500 hover:bg-red-700 px-3 py-1 rounded-md" title="Delete Image" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $image->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
