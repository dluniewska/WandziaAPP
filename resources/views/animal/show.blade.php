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
                                <h2>  {{ $animal->name }}</h2>
                            </div>
                            <div class="row justify-content-center" style="margin-bottom: 10px;">
                                <a class="btn btn-primary" href="{{ route('animal.index') }}" title="Create an animal">Go back</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                {{ $animal->name }}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Introduction:</strong>
                                {{ $animal->breed }}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Location:</strong>
                                {{ $animal->location }}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Chip:</strong>
                                {{ $animal->chip }}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Date Created:</strong>
                                {{ date_format($animal->created_at, 'jS M Y') }}
                            </div>
                        </div>

                        <div>
                        
                            <form method="POST" action="{{ route('animal.destroy', $animal)}}" onsubmit="return confirm('Do you really want to delete?');">

                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button type="submit" class="btn btn-danger">Delete this animal</button>
                            
                                <a class="btn btn-primary" href="{{ URL::to('animal/' . $animal->id . '/edit') }}">Edit this Animal</a>
                            </form>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection