<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use App\Models\Job;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function() {
    return view('about');
});

Route::get('/contact', function() {
    return view('contact');
});

Route::get('/jobs', function() {
    return view('jobs',['jobs' => Job::all()]);
});

Route::get('/job/{id}', function($id) {
    $job = Job::find($id);

    return view('job', ['job' => $job]);
});
