@extends('layouts.app')

@section('content')
    <div class="container" style="background-color: #E6E6FA;">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Episodes</div>
                    <div class="card-body">
                        <a href="{{ url('/episode/create') }}" class="btn btn-success btn-sm" title="Add New Episode">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/episode') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                            <div class="table-responsive">
                                <div class="table-responsive">
                                    <table class="table table-bordered w-100" style="border-color: black;">
                                        <thead>
                                            {{-- <tr style="border-color: black;"> --}}
                                                <th style="border-color: black;">#</th>
                                                <th style="border-color: black;">Titre</th>
                                                <th style="border-color: black;">Id Série</th>
                                                <th style="border-color: black;">Saison</th>
                                                <th style="border-color: black;">Type</th>
                                                <th style="border-color: black;">Path</th>
                                                <th style="border-color: black;">Taille</th>
                                                <th style="border-color: black;">Extension</th>
                                                <th style="border-color: black;">Actions</th>
                                            <!--</tr>-->
                                        </thead>
                                        <tbody>
                                        @foreach($episode as $item)
                                            <tr style="border-color: black;">
                                                <td style="border-color: black;">{{ $loop->iteration }}</td>
                                                <td style="border-color: black;">{{ $item->titre }}</td>
                                                <td style="border-color: black;">{{ $item->id_serie }}</td>
                                                <td style="border-color: black;">{{ $item->saison }}</td>
                                                <td style="border-color: black;">{{ $item->type }}</td>
                                                <td style="border-color: black;">{{ $item->path }}</td>
                                                <td style="border-color: black;">{{ $item->taille }}</td>
                                                <td style="border-color: black;">{{ $item->extension }}</td>
                                                <td style="border-color: black;">
                                                    <a href="{{ url('/episode/' . $item->id) }}" title="View Episode">
                                                        <button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button>
                                                    </a>
                                                    <a href="{{ url('/episode/' . $item->id . '/edit') }}" title="Edit Episode">
                                                        <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                                                    </a>
                                
                                                    <form method="POST" action="{{ url('/episode' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Episode" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                            <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                            
                            <div class="pagination-wrapper"> {!! $episode->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
