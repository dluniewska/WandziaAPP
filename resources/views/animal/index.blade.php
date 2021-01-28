@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mt-4">
            <div class="row justify-content-center" style="margin-bottom: 50px;">
                <h2>Register of chipped animals </h2>
            </div>
            <div class="row justify-content-center" style="margin-bottom: 50px;">
                <a class="btn btn-success" href="{{ route('animal.create') }}" title="Create an animal">Add new animal</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
    <div class="col-lg-12 margin-tb">
        <div class="row offset-md-1">
            <table class="table table-striped table-bordered col-xs-10 col-sm-10 col-md-10">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Breed</td>
                    <td>Location</td>
                    <td>Chip</td>
                    <td>Actions</td>
                </tr>
            </thead>
                <tbody>
                    @foreach($animals as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->breed }}</td>
                        <td>{{ $value->location }}</td>
                        <td>{{ $value->chip }}</td>

                        <!-- we will also add show, edit, and delete buttons -->
                    <td>

                        <!-- delete animal (uses the destroy method DESTROY /sharks/{id} -->
                        <!-- we will add this later since its a little more complicated than the other two buttons -->

                        <!-- show the animal (uses the show method found at GET /sharks/{id} -->
                        <a class="btn btn-small btn-success" href="{{ URL::to('animals/' . $value->id) }}">Show this Animal</a>

                        <!-- edit this shark (uses the edit method found at GET /sharks/{id}/edit -->
                        <a class="btn btn-small btn-info" href="{{ URL::to('animals/' . $value->id . '/edit') }}">Edit this Animal</a>

                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

<!-- 
                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>

                        </button> -->