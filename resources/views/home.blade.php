<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        
        <!-- normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */ -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   
    </head>
    
 
    <body class="antialiased">  
        @extends('layouts.app')
        @section('content')
        <div class="jumbotron text-center">
            <h1>AnimalCHIP</h1>
            <p>Lost animal in your area</p>
            <div class="row justify-content-center">
                <a class="btn btn-success" href="{{ route('animal.index') }}" title="animallist">Animal List</a>
            </div>           

        </div>

        <div class="container text-center">
               
            <h4>made by:</h4>
            <p>Daria Łuniewska
            <br>Paulina Ciach
            <br>Natalia Gościnna
            <br>Damian Jaszewski</p>  
            
        </div>
        @endsection
    </body>

    
</html>