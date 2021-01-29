<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Animal;
use App\Models\User;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the animals
        $animals = Animal::all();
    
        // load the view and pass the animals
        return view('animal.index')->with('animals', $animals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('animal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'breed' => 'required',
            'location' => 'required',
            'chip' => 'required|numeric'
        ]);

        Animal::create($request->all());

        // $user = User::find($id);
        // $animals->user_id = $user;
        // $animals->save();

        return redirect()->route('animal.index')->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $animal = Animal::find($id);
        return view('animal.show', compact('animal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the shark
        $animal = Animal::find($id);

        // show the edit form and pass the shark
        return view('animal.edit')->with('animal', $animal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animal)
    {
        $request->validate([
            'name' => 'required',
            'breed' => 'required',
            'location' => 'required',
            'chip' => 'required'
        ]);
        $animal->update($request->all());

        return redirect()->route('animal.index')->with('success', 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $animal=Animal::find($id);
        $animal->delete();
        return redirect()->route('animal.index')->with('success', 'Animal deleted successfully');
    }
}
