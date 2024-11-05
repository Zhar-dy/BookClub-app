<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function store(Request $request)
    {
        Genre::create([
            'name' => $request->name,
            'attachment' => $request->attachment ?? 'No Attachement'
        ]);

        return redirect()->route('home');
    }
}
