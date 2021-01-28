@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mt-4">
            <div class="row justify-content-center" style="margin-bottom: 50px;">
                <h2>Add New Animal</h2>
            </div>
            <div class="row justify-content-center" style="margin-bottom: 50px;">
                <a class="btn btn-primary" href="{{ route('animal.index') }}" title="Go back">BACK TO THE LIST</a>
            </div>
        </div>
    </div>

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
    <form action="{{ route('animal.store') }}" method="POST" >
        @csrf

        <div class="row offset-md-1">
            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong>Breed:</strong>
                    <input class="form-control" class="form-control" name="breed" placeholder="Breed"></input>
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong>Location:</strong>
                    <input type="text" name="location" class="form-control" placeholder="Location">
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong>Chip:</strong>
                    <input type="number" name="chip" class="form-control" placeholder="Chip">
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10 text-center" style="margin-top: 50px;">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection