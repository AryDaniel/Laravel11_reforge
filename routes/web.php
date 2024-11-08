<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use App\Models\Job;


Route::get('/', function () {
    $jobs = Job::all();
    //dd($jobs);//Here is the entire collection
    //dd($jobs[0]->title);//Here is just a instanse

    return view('welcome');
});

Route::get('/about', function() {
    return view('about');
});

Route::get('/contact', function() {
    return view('contact');
});

Route::get('/jobs', function() {
    // We are eager loading the 'employer' relationship 
    // to minimize the number of SQL queries and improve performance.
    $jobs = Job::with('employer')->cursorPaginate(3);
    //->simplePaginate(#);
    //->cursorPaginate(#);

    return view('jobs',[
        'jobs' => $jobs
    ]);
});

Route::get('/job/{id}', function($id) {
    $job = Job::find($id);

    return view('job', ['job' => $job]);
});
