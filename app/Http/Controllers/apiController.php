<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\User;
use Illuminate\Http\Request;

class apiController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function animal() {
        return response()->json(Animal::get(), 200);
    }

    public function animalID($id) {
        return response()->json(Animal::find($id), 200);
    }

    public function animalSave(Request $request) {
        $animal = Animal::create($request->all());
        return response()->json($animal, 201);
    }
}