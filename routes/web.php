<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::view('/about', 'about');
Route::view('/contact', 'contact');
Route::view('/services', 'services');
Route::view('/showcases', 'showcases');
Route::view('/blog', 'blog');

Route::get('/formtest', function(){
    $emails = session()->get('emails', []);

    return view('formtest',[
        'emails' => $emails,
    ]);
});

Route::post('/formtest', function(){
    $validated = request()->validate([
        'email' => 'required|email',
    ]);

    $email = $validated['email'];
    $emails = session()->get('emails', []);

    if (in_array($email, $emails)) {
        return redirect('/formtest')->with('error', 'This email already exists.');
    }

    if (count($emails) >= 5) {
        return redirect('/formtest')->with('error', 'Email limit reached (maximum 5).');
    }

    session()->push('emails', $email);

    return redirect('/formtest')->with('success', 'Email added successfully.');
});

Route::post('/delete-email', function(){
    $email = request('email');
    $emails = session()->get('emails', []);

    if (($key = array_search($email, $emails)) !== false) {
        unset($emails[$key]);
        session()->put('emails', array_values($emails));
    }

    return redirect('/formtest');
});

Route::get('/delete-emails', function(){
    session()->forget('emails');
    return redirect('/formtest');
});