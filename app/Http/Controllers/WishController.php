<?php

namespace App\Http\Controllers;

use App\Models\Wish;
use Illuminate\Http\Request;

class WishController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required|max:255',

            'message' => 'required',

            'avatar' => 'nullable|image|max:4096',
        ]);

        $avatarPath = null;

        if ($request->hasFile('avatar')) {

            $avatarPath =
                $request->file('avatar')
                ->store('wishes', 'public');
        }

        Wish::create([

            'name' => $request->name,

            'message' => $request->message,

            'avatar' => $avatarPath,
        ]);

        return redirect('/#section3');
    }
}