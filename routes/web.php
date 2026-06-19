<?php

use Illuminate\Support\Facades\Route;
use App\Models\Wish;
use App\Http\Controllers\WishController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {

    $wishes =
        Wish::latest()->paginate(10);

    return view(
        'home',
        compact('wishes')
    );
});

Route::post(
    '/wish',
    [WishController::class, 'store']
)->name('wish.store');

Route::get('/lang/{locale}', function ($locale) {

    if (!in_array($locale, ['vi', 'en', 'zh'])) {
        abort(404);
    }

    session()->put('locale', $locale);

    return redirect('/');
});

Route::get('/', [HomeController::class, 'index']);