<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(){
        // We are eager loading the 'employer' relationship 
        // to minimize the number of SQL queries and improve performance.
    
        //->latest() means orderBy the created at timestamp in descending order
        $jobs = Job::with('employer')->latest()->paginate(3);
        //->simplePaginate(#);
        //->cursorPaginate(#);
    
        return view('jobs.index',[
            'jobs' => $jobs
        ]);
    }

    public function create(){
        return view('jobs.create');
        
    }

    public function show(Job $job){
        return view('jobs.show', ['job' => $job]);
    }

    // Route Model Binding
    public function store(){
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
    }

    public function edit(Job $job){
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job){
        // authorize (On hold...)

        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
        ]);

        return redirect('/jobs/'. $job->id);
    }

    public function destroy(Job $job){
        $job->delete();
        return redirect('jobs');
    }
}
