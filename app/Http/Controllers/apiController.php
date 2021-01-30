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
        $animal = Animal::find($id);
        if(is_null($animal)) {
            return response()->json(["message" => "Record not found!"], 404);
        }
        return response()->json($animal, 200);
    }

    public function animalSave(Request $request) {
        $rules =[
            'name' => 'required',
            'breed' => 'required',
            'location' => 'required',
            'chip' => 'required|numeric|digits_between:6,8',
            'user_id' => 'numeric'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        
        $animal = Animal::create($request->all());
        return response()->json($animal, 201);
    }

    public function animalUpdate(Request $request, $id) {

        $animal = Animal::find($id);
        if(is_null($animal)) {
            return response()->json(["message" => "Record not found!"], 404);
        }
        $animal->update($request->all());
        return response()->json($animal, 200);
    }

    public function animalDelete(Request $request, $id) {
        $animal = Animal::find($id);
        if(is_null($animal)) {
            return response()->json(["message" => "Record not found!"], 404);
        }
        $animal->delete();
        return response()->json(null, 204);
    }
}