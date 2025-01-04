@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Edit Image #{{ $image->id }}</div>
                    <div class="card-body">
                        <a href="{{ url('/image') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        @extends('layouts.app')

                        @section('content')
                        <div class="container mx-auto p-6">
                            <div class="bg-gray-900 p-6 rounded-lg shadow-md">
                                <h1 class="text-2xl font-bold text-purple-400 mb-4">Edit Image</h1>
                                <form method="POST" action="{{ url('/image/' . $image->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                    {{ method_field('PATCH') }}
                                    {{ csrf_field() }}
                        
                                    @include('image.form', ['formMode' => 'edit'])
                        
                                </form>
                            </div>
                        </div>
                        @endsection
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
