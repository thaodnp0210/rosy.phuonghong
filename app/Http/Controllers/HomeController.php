<?php

namespace App\Http\Controllers;

use App\Models\Wish;

class HomeController extends Controller
{
    public function index()
    {
        $wishes = Wish::latest()
            ->paginate(10);

        return view('home', compact('wishes'));
    }
}