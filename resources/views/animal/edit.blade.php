@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                    <div class="row">
                        <div class="col-lg-12 margin-tb mt-4">
                            <div class="row justify-content-center" style="margin-bottom: 10px;">
                                <h2>Edit Animal</h2>
                            </div>
                            <div class="row justify-content-center" style="margin-bottom: 10px;">
                                <a class="btn btn-primary" href="{{ route('animal.index') }}" title="Go back">Go back</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            
                <form action="{{ route('animal.update', $animal->id) }}" method="POST">
                    @csrf
                    @method('PUT')
            
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    <input type="text" name="name" value="{{ $animal->name }}" class="form-control" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Breed:</strong>
                                    <input class="form-control" name="breed" value="{{ $animal->breed }}" placeholder="Breed"></input>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Location:</strong>
                                    <input type="text" name="location" class="form-control" placeholder="{{ $animal->location }}" value="{{ $animal->location }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Chip:</strong>
                                    <input type="number" name="chip" class="form-control" placeholder="{{ $animal->chip }}" value="{{ $animal->chip }}">
                                </div>
                            </div>
                            
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection