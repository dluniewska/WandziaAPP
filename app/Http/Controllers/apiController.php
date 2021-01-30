<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\User;
use Illuminate\Http\Request;

class apiController extends Controller
{

    public function animal() {
        return response()->json(Animal::get(), 200);
    }
}