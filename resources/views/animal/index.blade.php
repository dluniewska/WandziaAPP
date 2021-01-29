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
                    <td>Created</td>
                    <td>Created by</td>
                    <td>Actions</td>
                    <td>Send SMS</td>
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
                        <td>{{ $value->created_at }}</td>
                        <td>{{ $value->user_id }}</td>

                        <!-- we will also add show, edit, and delete buttons -->
                    <td>
                        
                        <form method="POST" action="{{ route('animal.destroy', $value->id)}}" onsubmit="return confirm('Do you really want to delete?');">

                            

                            <!-- show the animal (uses the show method found at GET /sharks/{id} -->
                            <a class="btn btn-small btn-success" href="{{ URL::to('animal/' . $value->id) }}">Show</a>

                            <!-- edit this animal (uses the edit method found at GET /sharks/{id}/edit -->
                            <a class="btn btn-small btn-info" href="{{ URL::to('animal/' . $value->id . '/edit') }}">Edit</a>

                             <!-- delete animal (uses the destroy method DESTROY /animal/{id} -->
                            {{ csrf_field() }}
                            {{ method_field('delete') }}

                            <button type="submit" class="btn btn-danger">Delete</button>
                            
                        </form>

                    </td>
                    <td>
                        <form method="POST" action="{{ route('sms')}}" onsubmit="return confirm('Do you want to send alert?');" accept-charset="UTF-8">

                        @csrf
                        <button type="submit" class="btn btn-warning">Alert</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection