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

    //->latest() means orderBy the created at timestamp in descending order
    $jobs = Job::with('employer')->latest()->paginate(3);
    //->simplePaginate(#);
    //->cursorPaginate(#);

    return view('jobs.index',[
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/create', function() {
    return view('jobs.create');
});

Route::get('/jobs/{id}', function($id) {
    $job = Job::find($id);

    return view('jobs.show', ['job' => $job]);
});

Route::post('/jobs', function(){
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1 // Authentication is not yet covered, so we'll hardcode an employer for now.
    ]);

    return redirect('/jobs'); 
});
