<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Todo;
use Illuminate\Http\Response;

class CrudController extends Controller {
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $todo = Todo::all();
        return view('home')->with(compact('todo'));
    }
    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required'
        ]);
        $todo = Todo::create($data);
        return $todo;
    }
}