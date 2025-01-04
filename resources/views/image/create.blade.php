@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Create New Image</div>

                    @section('content')
                    <div class="container mx-auto p-6">
                        <div class="bg-gray-900 p-6 rounded-lg shadow-md">
                            <h1 class="text-2xl font-bold text-purple-400 mb-4">Create New Image</h1>
                            <form method="POST" action="{{ url('/image') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                {{ csrf_field() }}
                    
                                @include('image.form', ['formMode' => 'create'])
                    
                            </form>
                        </div>
                    </div>
                    @endsection
                </div>
            </div>
        </div>
    </div>
@endsection

