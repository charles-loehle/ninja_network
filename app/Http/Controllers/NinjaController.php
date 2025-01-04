<?php

namespace App\Http\Controllers;

use App\Models\Ninja;
use App\Models\Dojo;
use Illuminate\Http\Request;

class NinjaController extends Controller
{
    public function index() {
        // GET
        // route --> /ninjas/
        // fetch all records and pass into the index view
        $ninjas = Ninja::with('dojo')->orderBy('created_at', 'desc')->paginate(10);

        return view('ninjas.index', ['ninjas' => $ninjas]);
    }

    public function show($id) {
        // GET
        // route --> /ninjas/{id}
        // fetch single record and pass into the show view
        $ninja = Ninja::with('dojo')->findOrFail($id);
    
        return view('ninjas.show', ['ninja' => $ninja]);
    }

    public function create() {
        // GET
        // route --> /ninjas/create
        // render a create form view
        $dojos = Dojo::all();

        return view('ninjas.create', ['dojos' => $dojos]);
    }

    public function store(Request $request) {
        // dd($request);
        // POST
        // route --> /ninjas/
        // store a new ninja to database
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'skill' => 'required|integer|min:0|max:100',
            'bio' => 'required|string|min:20|max:1000',
            'dojo_id' => 'required|exists:dojos,id',
        ]);

        Ninja::create($validated);

        return redirect()->route('ninjas.index');
    }

    public function destroy($id) {
        $ninja = Ninja::findOrFail($id);
        $ninja->delete();

        return redirect()->route('ninjas.index');
    }
}
