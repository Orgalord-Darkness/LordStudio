@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Edit Serie #{{ $serie->nom }}</div>
                    <div class="card-body">
                        <a href="{{ url('/serie') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/serie/' . $serie->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('put') }}
                            {{ csrf_field() }}
                            @method('put')

                            @include ('serie.form', ['formMode' => 'edit'])

                        </form>
                        
                          
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
