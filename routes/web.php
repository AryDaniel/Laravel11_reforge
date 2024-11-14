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

// Index
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

// Create
Route::get('/jobs/create', function() {
    return view('jobs.create');
});

// Show
Route::get('/jobs/{id}', function($id) {
    $job = Job::find($id);

    return view('jobs.show', ['job' => $job]);
});

// Store
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

// Edit
Route::get('/jobs/{id}/edit', function($id) {
    $job = Job::find($id);

    return view('jobs.edit', ['job' => $job]);
});

// Update
// Patch - A set of instructions for how to modify a resource.
Route::patch('/jobs/{id}', function($id) {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);
    
    // authorize (On hold...)
    
    $job = Job::findOrFail($id); 

    // $job->title = request('title');
    // $job->salary = request('salary');
    // $job->save();

    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);

    return redirect('/jobs/'. $job->id);
});

// Destroy 
Route::delete('/jobs/{id}', function($id) {
    // $job = Job::findOrFail($id);
    // $job->delete();

    Job::findOrFail($id)->delete();

    return redirect('jobs');
});
