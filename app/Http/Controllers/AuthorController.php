<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        return Author::all();
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
            'first_name' => 'required',
            'last_name'  => 'required'
        ]);
        return Author::create($request->all());
    }
    /**
     * Display the specified Author.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Author::find($id);
    }

    /**
     * Search for a lastName
     *
     * @param  str  $lastName
     * @return \Illuminate\Http\Response
     */
    public function search($lastName)
    {
        return Author::where('title', 'like', '%'.$lastName.'%')->get();
    }

}
